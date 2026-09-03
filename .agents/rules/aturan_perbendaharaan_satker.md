# Aturan & Pengetahuan Bisnis Pejabat Perbendaharaan Satker (SIPERBEN)

Dokumen ini adalah aturan tetap (*permanent business rules & knowledge*) untuk aplikasi SIPERBEN Kemendikdasmen (kode kementerian `138`). Wajib dipatuhi saat melakukan query, agregasi laporan, penanganan anomali data, atau pemeliharaan modul perbendaharaan.

---

## 1. Lingkup Satuan Kerja & Unit Utama Aktif

1. **Kementerian Aktif**: Hanya **Kementerian Pendidikan Dasar dan Menengah (Kode 138)**.
2. **Satker Nonaktif (Pendidikan Tinggi / Dikti)**:
   - Seluruh satker PTN, Politeknik, dan LLDIKTI telah dinonaktifkan:
     - `app_m_unor.deleted = 1`
     - `kepeg_m_unor.date_expired = '2024-12-31'` (untuk cabang di bawah `id_atasan IN (1628, 14988, 15006)`)
     - `priv_t_user.ldeleted = 1`
3. **7 Unit Utama (Eselon 1) Definitif**:
   - `13801` — **Sekretariat Jenderal** (14 Satker: 12 Biro/Pusat utama + 2 UPT/Atase)
   - `13802` — **Inspektorat Jenderal** (1 Satker)
   - `13803` — **Ditjen Guru dan Tenaga Kependidikan** (40 Satker: Balai/Balai Besar GTK)
   - `13804` — **Ditjen PAUD, Dikdas, dan Dikmen** (40 Satker: BPMP & Direktorat; 39 aktif ber-SK)
   - `13805` — **Ditjen Pendidikan Vokasi** (12 Satker: BBPPMPV & Direktorat)
   - `13811` — **BSKAP** (6 Satker: Pusat-Pusat Kurikulum & Asesmen)
   - `13812` — **Badan Pengembangan dan Pembinaan Bahasa** (34 Satker: Balai/Kantor Bahasa)
   - **Total Satker Kemendikdasmen**: 147 Satker (146 aktif memiliki SK sah).

---

## 2. Aturan Pejabat Perbendaharaan (KPA, BP, BPn)

1. **Rasio Satker**:
   - **1 Satker = Tepat 1 KPA** (`ijabid2 = 1`).
   - **1 Satker = Tepat 1 BP** (`ijabid2 = 2`).
   - **BPn (`ijabid2 = 3`)**: Opsional (bisa ada 0, 1, atau lebih sesuai kebutuhan satker).
2. **Jumlah KPA & BP pada Rekapitulasi Unit Utama**:
   - Jumlah KPA dan BP aktif pada tabel rekapitulasi (`Rekap_pejabat.php`) **harus sama dengan jumlah satuan kerja yang memiliki SK aktif**.
   - **Pola Query Rekapitulasi**:
     Untuk `ijabid2 IN (1, 2)` wajib menghitung keunikan satuan kerja: `COUNT(DISTINCT ckduker)`.
     Untuk jabatan lainnya (`ijabid2 NOT IN (1, 2)`) menghitung keunikan orang: `COUNT(DISTINCT cnip)`.
     ```sql
     SELECT ijabid2,
            CASE 
                WHEN ijabid2 IN (1, 2) THEN COUNT(DISTINCT ckduker)
                ELSE COUNT(DISTINCT cnip)
            END as total
     FROM app_t_usulan_pegawai
     WHERE ckduker IN (...)
       AND CASE 
            WHEN ijabid2 NOT IN (4,5,6,7) THEN inoskid != 0 AND inoskid IS NOT NULL AND isnonaktif = 0
            ELSE isnonaktif = 0
           END
     GROUP BY ijabid2
     ```
     *Alasan*: Mencegah distorsi angka jika terdapat seorang pejabat (NIP yang sama) yang merangkap sebagai KPA/BP di beberapa satker/UPT sekaligus.

---

## 3. Aturan Laporan Detil SK Kemdikbud (Per Satuan Kerja)

1. **Unik per Satker (Hanya 1 Baris per Satker)**:
   - Setiap satuan kerja **tidak boleh muncul lebih dari 1 kali** pada tabel maupun hasil unduhan Excel.
   - Wajib menggunakan `GROUP BY a.iunorid` (JANGAN pernah mengelompokkan `GROUP BY a.ctahun, a.iunorid` karena akan menduplikasi satker tiap tahun usulan).
2. **Selalu Ambil Usulan SK Aktif Terakhir**:
   - Gunakan subquery `INNER JOIN` yang memilih `MAX(id)` usulan per satker di mana usulan disetujui (`istatus = '7'`), berjenis SK Kemdikbud (`ijns = 1`), berpejabat aktif (`isnonaktif = 0`), dan memiliki ID SK sah (`inoskid != 0 AND inoskid IS NOT NULL`):
     ```sql
     JOIN (
         SELECT MAX(u_sub.id) as max_id, u_sub.iunorid
         FROM app_t_usulan u_sub
         JOIN app_t_usulan_pegawai p_sub ON u_sub.id = p_sub.iusulanid
         WHERE u_sub.istatus = '7' AND u_sub.ijns = 1 
           AND p_sub.isnonaktif = 0 
           AND p_sub.inoskid != 0 AND p_sub.inoskid IS NOT NULL
         GROUP BY u_sub.iunorid
     ) latest_u ON a.id = latest_u.max_id
     ```
3. **Pemberlakuan Syarat Validitas SK**:
   - **JANGAN** menggunakan filter eliminasi `AND (SELECT cnosk FROM app_t_usulan_sk WHERE id = b.inoskid) IS NOT NULL`. Filter tersebut menyebabkan satker sah terbuang hanya karena nomor SK di tabel `app_t_usulan_sk` masih kosong/NULL.
   - Gunakan validasi relasi SK sah: `b.inoskid != 0 AND b.inoskid IS NOT NULL`.
   - Gunakan fallback pada teks nomor SK:
     ```sql
     (SELECT CASE 
                 WHEN cnosk != '' AND cnosk IS NOT NULL AND cnosk != '.' THEN cnosk 
                 ELSE '-' 
             END 
      FROM app_t_usulan_sk WHERE id = b.inoskid) as no_sk
     ```

---

## 4. Penanganan Anomali Data yang Sering Terjadi

1. **Satker Hilang dari Laporan**:
   - Periksa apakah kolom `cnosk` pada `app_t_usulan_sk` bernilai NULL/kosong. Pastikan query menggunakan relasi `b.inoskid != 0` dan bukan filter string `cnosk IS NOT NULL`.
2. **Satker Duplikat di Modal/Laporan**:
   - Periksa klausul `GROUP BY`. Pastikan murni `GROUP BY a.iunorid` dengan join ke usulan mutakhir `latest_u`.
3. **Jumlah KPA/BP di Rekap Berbeda dari Jumlah Satker**:
   - Periksa fungsi agregasi `get_total_perbendaharaan()`. Pastikan `COUNT(DISTINCT ckduker)` diterapkan untuk `ijabid2 IN (1, 2)` agar merata 1 KPA dan 1 BP per satker aktif.
