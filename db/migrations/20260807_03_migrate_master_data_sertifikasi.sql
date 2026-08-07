-- =============================================================================
-- Migration: 20260807_03_migrate_master_data_sertifikasi.sql
-- Purpose  : Master Data Certification Full Sync (Bendahara, PPK, PPSPM)
-- Target DB: db_app01
-- Created  : 2026-08-07 10:12:02
-- Total Rec: 3578
-- =============================================================================

UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06099/185/514/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '198111222010121003'; -- ABDULLAH AZIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02696/087/713/2023', `dtgltsnt` = '2023-03-30', `dtglksnt` = '2028-03-30', `dtglsertifikat` = '2023-03-30', `dtglkadaluarsa` = '2028-03-30' WHERE `cnip` = '198201062008012012'; -- ANITA YANUAR PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08486/185/616/2020' WHERE `cnip` = '197102241994031001'; -- AZIZ NAHROWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04735/185/129/2017' WHERE `cnip` = '198206052005012003'; -- BUNGA CHITRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10945/087/089/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198706272014042001'; -- HAPSARI INDYAH PRATIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02764/185/799/2017' WHERE `cnip` = '196801111988032001'; -- IDA ROSMALA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08450/185/247/2018' WHERE `cnip` = '197110302005011001'; -- MUHAMAD YASIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02115/087/699/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `cnosnt` = NULL, `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198603272008122001'; -- RHEA KARTIKASARI KIRANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04900/185/043/2020' WHERE `cnip` = '198404132018012001'; -- VEY EVELYN SINAGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03094/185/616/2017', `cnopnt` = NULL WHERE `cnip` = '198105022005011001'; -- ADE ABDUL AJIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08447/185/713/2018' WHERE `cnip` = '196808051991032002'; -- ARBAYAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-19801/087/449/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198506142008012002'; -- DEWI FITRIANY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08107/185/846/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408082009121005'; -- DWI PRABOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03178/185/269/2017' WHERE `cnip` = '197901142005011003'; -- FAIZ AYATULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02741/185/194/2017', `cnopnt` = NULL WHERE `cnip` = '198501252010121005'; -- I DEWA GEDE SAYANG ADI YADNYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03149/185/597/2017' WHERE `cnip` = '198905212015041003'; -- IRWAN SETIAWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03181/185/593/2017' WHERE `cnip` = '196503011987021001'; -- ISKAMTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03183/185/815/2017' WHERE `cnip` = '198411042015042002'; -- KARINA HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03118/185/153/2017' WHERE `cnip` = '198510072015042002'; -- NURINA VIDYA KURNIAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03161/185/391/2017' WHERE `cnip` = '199105262014041001'; -- REZZA SURYA NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03197/185/600/2017' WHERE `cnip` = '199208072015042001'; -- SHELLY LAWRIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02774/185/300/2017' WHERE `cnip` = '196903231993031001'; -- SUKAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06777/088/927/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197703112000031002'; -- TAOPIQ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08459/185/556/2018', `cnosnt` = NULL WHERE `cnip` = '197307261994032002'; -- WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08475/185/074/2018' WHERE `cnip` = '196911031988032001'; -- YOSSI NUR SANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04242/030/412/2023', `cnosnt` = NULL WHERE `cnip` = '198308052015041002'; -- AGUS LIMBANG WARDANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08461/185/019/2018' WHERE `cnip` = '198205142010121004'; -- ANDI SETIYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04805/185/817/2020' WHERE `cnip` = '198206112014041002'; -- ARIF MUKTI WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03755/087/020/2024', `cnosnt` = NULL WHERE `cnip` = '198008222014041001'; -- BAYU PANCA HADI SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04179/185/321/2020' WHERE `cnip` = '196509302009101001'; -- BOYKE FIRMAN HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00099/088/538/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198211212015042003'; -- CAECILIA CAHYANINGSIH KRISTILESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03137/185/834/2017' WHERE `cnip` = '198306012015042002'; -- CAHYA KUSUMA RATIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02055/087/842/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199507072020122020'; -- DEA KUSUMA PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03930/185/445/2018', `cnopnt` = 'PNT-01923/087/445/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198303282015041002'; -- DODI SUSWANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01247/087/244/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198203272009122005'; -- DWI RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02075/087/644/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199212112020121007'; -- DYTO AGUNG DWI NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03913/185/256/2018', `cnopnt` = 'PNT-01083/087/252/2023', `dtgltpnt` = '2023-02-01', `dtglkpnt` = '2028-02-01', `cnosnt` = NULL, `dtglsertifikat` = '2023-02-01', `dtglkadaluarsa` = '2028-02-01' WHERE `cnip` = '198305242015042002'; -- EFLITA MEIYETRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08110/185/050/2018' WHERE `cnip` = '197504132000031001'; -- ENANG SAPRUDIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02694/087/261/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198410092009121005'; -- FIRMANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02478/087/581/2026', `cnosnt` = NULL WHERE `cnip` = '198912142015041002'; -- HARITZ CAHYA NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08483/185/883/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197607082007012001'; -- HELMINAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02750/087/684/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198608132015041002'; -- HENDRA GUSTIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02827/185/289/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197612062008101001'; -- HERDIANA, S.T., M.B.A.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08517/191/181/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198509182009121007'; -- HERU DWI SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03754/087/599/2024', `cnosnt` = NULL WHERE `cnip` = '198403192009121007'; -- IKHTIARI SURYADHARMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08484/185/004/2018' WHERE `cnip` = '197301272005011002'; -- JANU AKHADIAT UTAMA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-07129/087/019/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198006242009121001'; -- JOKO SUPRIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02165/087/524/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198407152014041002'; -- KOKOH HANDOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02693/185/540/2017' WHERE `cnip` = '197806132009121004'; -- MUHAMMAD YANI HERMANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04702/185/453/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198711072015042003'; -- NOVITASARI CAHYANING UTOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03188/185/650/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199110142015042002'; -- NURUL KHOSIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04796/185/576/2020' WHERE `cnip` = '198901162010122004'; -- PUJI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03162/185/892/2017' WHERE `cnip` = '197402051994031003'; -- ROMZAK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-000666', `cnopnt` = 'PNT-000444', `cnosnt` = 'SNT-000555' WHERE `cnip` = '197212251993032003'; -- SITI AISYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-06048/087/108/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197912022014041001'; -- SOBAR RACHMAYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02772/185/508/2017' WHERE `cnip` = '197405181994032003'; -- SUDARMI NINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08094/087/701/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198006032015041001'; -- SUGIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08457/185/004/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197008141992031003'; -- SUMARWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04717/185/109/2020', `cnopnt` = 'PNT-06247/087/109/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '196707101988031004'; -- SUPRIYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03200/185/745/2017' WHERE `cnip` = '198511112015041003'; -- VICTOR SY LABOTANO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05793/087/254/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198308122009121004'; -- WAHYU HADHI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04200/185/976/2020' WHERE `cnip` = '196407201991032001'; -- YULI PERTIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06850/088/179/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198007152015041001'; -- YURISMAN MAPALA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01954/037/999/2017' WHERE `cnip` = '196612311990031008'; -- I MADE WITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08936/185/456/2020' WHERE `cnip` = '199408032019022015'; -- NI KADEK SRI SUMIARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11081/185/041/2019' WHERE `cnip` = '196503151985031001'; -- D SARIPUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08916/185/514/2020' WHERE `cnip` = '199211112019022002'; -- KATRYNADA JAUHARATNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08939/185/559/2020' WHERE `cnip` = '199403272019022010'; -- WULANDARI RETNANINGTIYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06182/045/717/2018', `cnopnt` = NULL WHERE `cnip` = '198709032011012006'; -- ANNISA SEPTIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08926/185/475/2020' WHERE `cnip` = '198708102019022002'; -- GUSTI GHEA MAHARDIKHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08947/185/668/2020' WHERE `cnip` = '197605262006052001'; -- FIONA MEYKE LATUPAPUA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06618/061/671/2019' WHERE `cnip` = '197611102006052002'; -- GLAUDIA CHRISTINA BEATRIX DE FRETES
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06622/061/406/2019' WHERE `cnip` = '197010062006052001'; -- JOLANDA DONA MANUPUTTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03068/063/757/2020' WHERE `cnip` = '196712101990032002'; -- ENI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03935/185/310/2018' WHERE `cnip` = '197710082007012002'; -- KOSTANTINA MAGDALENA MARANI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-05303/054/581/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198008092011012007'; -- HERNIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03911/185/524/2018' WHERE `cnip` = '197806132006051003'; -- BRISKA F T SITANGGANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04165/004/456/2019' WHERE `cnip` = '197706222006052001'; -- ELISABETH YUNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03145/185/963/2017' WHERE `cnip` = '199105312014042001'; -- FIFI LUTFIA WARDHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01000/014/691/2016', `cnosnt` = NULL WHERE `cnip` = '197212222006052001'; -- ISMAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08929/185/498/2020', `cnopnt` = NULL WHERE `cnip` = '198409212009022004'; -- IVANNA SEPTIANNA PANJAITAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02663/049/907/2020' WHERE `cnip` = '197312152006051001'; -- JAMALUDDIN GOBEL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08913/185/901/2020' WHERE `cnip` = '199511212019021004'; -- JOHAN MANURUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10186/030/806/2019' WHERE `cnip` = '198406282011011008'; -- JOKO RAHARJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06496/049/935/2018' WHERE `cnip` = '196907161993031001'; -- LODEWYK MAMAHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00178/004/646/2017' WHERE `cnip` = '197606072007011002'; -- MASDAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01592/185/357/2019' WHERE `cnip` = '197511182009122001'; -- NOVA MUTIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03851/185/157/2018' WHERE `cnip` = '198711132015042002'; -- NUNGKI KARINA PUSPARANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09082/185/579/2020' WHERE `cnip` = '197910262009122002'; -- PAULINA EKO HARRY NUGRAHINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09089/185/776/2020' WHERE `cnip` = '199002152019021006'; -- PUTRA KAMA JAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03549/087/391/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199703312018121002'; -- RACHMAT SUBEKTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03921/185/295/2018' WHERE `cnip` = '198612232011012006'; -- RINANDA PRAGIANANTA ROSANNE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03941/185/207/2018' WHERE `cnip` = '196408311991031001'; -- SUHADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03942/185/308/2018', `cnopnt` = 'PNT-06251/191/304/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198606212011012015'; -- SUMANTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00465/191/815/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '198904252014041003'; -- ADHIKA WIDHI NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04245/087/615/2024', `dtgltsnt` = '2024-06-30', `dtglksnt` = '2029-06-30', `dtglsertifikat` = '2024-06-30', `dtglkadaluarsa` = '2029-06-30' WHERE `cnip` = '197505092005011001'; -- ALFAN SORY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02168/087/217/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197502082005012003'; -- AMALIAH FITRIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05646/191/011/2022', `dtgltbnt` = '2022-10-25', `dtglkbnt` = '2027-10-25', `dtglsertifikat` = '2022-10-25', `dtglkadaluarsa` = '2027-10-25' WHERE `cnip` = '199709052020122009'; -- AMELIA AZZAHRA .S
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00032/191/915/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = 'PNT-08039/087/910/2024', `dtgltpnt` = '2024-09-24', `dtglkpnt` = '2029-09-24', `cnosnt` = 'SNT-07836/087/914/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '198611302009122007'; -- ANDHINA PRATHIDINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08396/191/416/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198307152018011001'; -- ANDRI SUTRISNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05475/087/811/2023', `dtgltpnt` = '2023-06-28', `dtglkpnt` = '2028-06-28', `cnosnt` = 'SNT-03269/440/810/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198408172009121003'; -- ANDRY RIHARDIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08448/185/814/2018' WHERE `cnip` = '197808142008012022'; -- ARI SUCI WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-07133/087/614/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '199003132015041001'; -- ATEP KARTIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01459/191/229/2017', `cnopnt` = 'PNT-07702/087/226/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198409102014041001'; -- BAYU HERPRABOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01479/088/631/2017', `cnopnt` = 'PNT-07593/087/634/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198706232015042001'; -- CORRY MARGARETHA GULTOM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06051/191/842/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '197509162014091001'; -- DANI ASHARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06102/185/549/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '198210312009121002'; -- DIAN ALMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04023/185/549/2021', `dtgltbnt` = '2021-10-01', `dtglkbnt` = '2026-10-01', `dtglsertifikat` = '2021-10-01', `dtglkadaluarsa` = '2026-10-01' WHERE `cnip` = '198402102015042002'; -- DIAN SYAHRANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06269/087/943/2023', `dtgltpnt` = '2023-07-06', `dtglkpnt` = '2028-07-06', `dtglsertifikat` = '2023-07-06', `dtglkadaluarsa` = '2028-07-06' WHERE `cnip` = '198510052010121004'; -- DODI RIZKI PRIBADI NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03868/185/555/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-07108/087/556/2024' WHERE `cnip` = '198107182005012004'; -- EKA SETIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01736/440/657/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197503012005011002'; -- EKO MARWOTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00159/088/655/2018', `cnopnt` = 'PNT-02334/087/652/2020', `cnosnt` = 'SNT-08123/087/094/2022' WHERE `cnip` = '198002062010122002'; -- ELLIS DARMAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00013627/121/3005/114/2022', `cnosnt` = NULL WHERE `cnip` = '197807152008121002'; -- FRANDI YUANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01955/088/580/2018' WHERE `cnip` = '198209242014042002'; -- HASTI KUSUMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02761/185/486/2017' WHERE `cnip` = '196707041992032001'; -- HATIYANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-15901/087/596/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198508222018011001'; -- IKHSAN PRABOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00299/088/410/2018', `cnopnt` = 'PNT-07837/087/425/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = 'SNT-08600/087/424/2022', `dtgltsnt` = '2022-09-30', `dtglksnt` = '2027-09-30', `dtglsertifikat` = '2022-09-30', `dtglkadaluarsa` = '2027-09-30' WHERE `cnip` = '198806022010122006'; -- KANIA JUNIAR ISKANDAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05623/191/436/2022', `dtgltbnt` = '2022-10-25', `dtglkbnt` = '2027-10-25', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2022-10-25', `dtglkadaluarsa` = '2027-10-25' WHERE `cnip` = '199507302020122017'; -- LEVINA IZA WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00324/088/739/2018', `cnopnt` = 'PNT-09351/087/738/2021', `dtgltpnt` = '2026-06-30', `dtglkpnt` = '2031-06-30', `cnosnt` = 'SNT-01494/087/738/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198601202009122008'; -- LIVYA CHAIRUNNISA AHDIATI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00456/440/745/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198103142005012002'; -- MAYA INDRYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06676/191/445/2022', `dtgltbnt` = '2022-12-29', `dtglkbnt` = '2027-12-29', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2022-12-29', `dtglkadaluarsa` = '2027-12-29' WHERE `cnip` = '198408312015041003'; -- MEGA BIRLIAN ADHITYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07569/191/447/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = 'PNT-11563/087/446/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '198301202009122002'; -- MEGA RIYANTI BAYU PUTRI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '196605221990011001'; -- MOHAMAD ARFAN FAROBY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07064/185/147/2018' WHERE `cnip` = '197008241993031001'; -- M SYUKUR A
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-18983/087/249/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '199509272018011002'; -- MUADZ ANSHORI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07132/087/443/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198309222018011001'; -- MUHAMMAD HERU IMAN WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00387/088/648/2018', `cnosnt` = 'SNT-00455/440/644/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197203042003121001'; -- MUKINO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01056/191/342/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '197709282005012002'; -- MULYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07594/191/255/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197611252015042001'; -- NOVITA INDRI GARINI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-19903/440/442/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198611172009121002'; -- NOVRIAN SATRIA PERDANA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03727/019/559/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = 'SNT-11708/087/557/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198504082010121010'; -- NUR MUHAMMADITYA PRIATMAJA HUSNANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03462/191/975/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199705082018121003'; -- PANDE PUTU KHRISNA ARIYUDHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08922/185/271/2020' WHERE `cnip` = '196903041988122001'; -- PURNAMA DEWI ANJANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '197908232003122002'; -- RAHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00463/088/093/2018', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `cnopnt` = NULL, `cnosnt` = 'SNT-08123/087/094/2022', `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '198106052009122002'; -- RETNO PALUPI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08933/185/393/2020', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '198912032015041001'; -- REZA WIRAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01476/191/208/2017', `dtgltbnt` = '2022-10-18', `dtglkbnt` = '2027-10-18', `dtglsertifikat` = '2022-10-18', `dtglkadaluarsa` = '2027-10-18' WHERE `cnip` = '199105252015042003'; -- SARY HENDRYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08455/185/202/2018', `dtgltbnt` = '2023-05-31', `dtglkbnt` = '2028-05-31', `dtglsertifikat` = '2023-05-31', `dtglkadaluarsa` = '2028-05-31' WHERE `cnip` = '199205152015042002'; -- SISTYA ROSI DIAPRINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02709/191/108/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199407012020122022'; -- SITI NURJANAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08473/185/802/2018' WHERE `cnip` = '198004152005011002'; -- SUJARMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00020594/121/3005/114/2022' WHERE `cnip` = '196808011988122001'; -- SUNARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01956/191/621/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198406262015042001'; -- TATIK SOROEIDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07279/191/825/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198612072020122006'; -- TRI WAHYUNINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03857/185/123/2018' WHERE `cnip` = '196510091988121001'; -- TUKIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06132/185/342/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198109142015042001'; -- VIRTA DWIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01990/185/859/2021', `cnopnt` = NULL WHERE `cnip` = '196903282005012001'; -- WAHYUNI INDRIATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08311/087/253/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198408022018011001'; -- WIJANARKO ADI NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02145/440/072/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198006062005012003'; -- YUNITA MURDIYANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01670/191/714/2022', `dtgltbnt` = '2022-04-20', `dtglkbnt` = '2027-04-20', `cnopnt` = NULL, `cnosnt` = 'No Seri. 061130', `dtglsertifikat` = '2022-04-20', `dtglkadaluarsa` = '2027-04-20' WHERE `cnip` = '197509062009101002'; -- ABDUL KARIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01185/191/515/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197905132009101001'; -- ABDUL KHOLIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00989/191/616/2024', `cnopnt` = 'PNT-04116/087/612/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = 'SNT-02980/087/619/2024', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '199204292019021007'; -- ABI DZAR ALGHIFFARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07052/185/54/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198002142006041001'; -- ABU CHANIFAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11094/185/415/2019', `dtgltbnt` = '2024-12-20', `dtglkbnt` = '2029-12-20', `dtglsertifikat` = '2024-12-20', `dtglkadaluarsa` = '2029-12-20' WHERE `cnip` = '198608022015041002'; -- ACHMAD HABIB YOES AGUSTA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04943/185/510/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196611101991031004'; -- ACHMAD HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-07334/087/017/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198608082010121006'; -- ADINANTO MAHULAE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02334/185/830/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199103232018011003'; -- ADITYA RACHMAT TRI PAMUNGKAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06658/185/115/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196408121990021001'; -- AGUS MULYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11090/185/111/2019' WHERE `cnip` = '198108132010121002'; -- AGUS PRAMONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04904/592/617/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197202232005011001'; -- AGUS SUPRIYANTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07863/087/614/2024' WHERE `cnip` = '197702282001121001'; -- AGUS  TRIARSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-16732/087/419/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = '00001317/121/3005/114/2019', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198104292008011010'; -- AHMAD MUDZAFFAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08446/185/712/2018', `cnopnt` = NULL WHERE `cnip` = '199202132014042001'; -- ALMA GRACIA MARIANA PRIOSISKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01193/191/114/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197912022007011001'; -- AMIR FAUZI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-19377/087/117/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197912202002121002'; -- ANANDES LANGGUANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03098/185/610/2017', `cnopnt` = NULL, `cnosnt` = 'SNT-19376/087/616/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198607142010121008'; -- ANANG KUSUMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07191/185/318/2020', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '198007172003122001'; -- ANITA CHRISTIE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04891/191/112/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198207312014092003'; -- ANNISA ESTRITASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07000/185/517/2018' WHERE `cnip` = '198204292008121002'; -- ANWAR TAUFIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09233/185/617/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197704172010122003'; -- APRILLA ARIESHINTA HELMARIS
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-14691/018/911/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197103172006041001'; -- ARIES SETIO NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06245/087/017/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197702042005011001'; -- ASEP TONI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07196/185/913/2020', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '198102172006042001'; -- ASIH SULISTIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09620/185/917/2020' WHERE `cnip` = '199511302019022009'; -- AYU ISLAMIATI SAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02756/185/520/2017' WHERE `cnip` = '197912062009121001'; -- BAYU PRATAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06560/185/927/2020' WHERE `cnip` = '196910031990022003'; -- BERTAULI MANIHURUK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02894/087/223/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198303262009121003'; -- BRIAN ARIESKA PRANATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02546/088/437/2019' WHERE `cnip` = '197010242005011001'; -- CAHYO WINARNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04613/087/134/2026', `dtgltbnt` = '2026-07-14', `dtglkbnt` = '2031-07-14', `dtglsertifikat` = '2026-07-14', `dtglkadaluarsa` = '2031-07-14' WHERE `cnip` = '197905282005011002'; -- CHAERUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02757/185/531/2017' WHERE `cnip` = '197906302005011001'; -- CHRISTIAWAN ADI NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01766/087/030/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197510252005012002'; -- CYTI DANIELA ARUAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05104/087/140/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199112082015041002'; -- DANU BRAMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01952/185/447/2021', `dtgltbnt` = '2026-06-30', `dtglkbnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198308232009121009'; -- DARMAWAN SETYO UTOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06470/185/747/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '197310241994031001'; -- DARWANTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07272/087/248/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '199105162014042001'; -- DEDEK MEILANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08095/087/342/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197210212005012001'; -- DEWI ANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06458/191/043/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198408192009121004'; -- DHIKA MARDIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05474/087/340/2023', `cnosnt` = NULL WHERE `cnip` = '197405072008012007'; -- DIANA DAMEY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01574/185/847/2019' WHERE `cnip` = '197809042003121001'; -- DIEN BURHANUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06714/185/848/2020', `cnopnt` = 'PNT-01506/087/842/2024', `dtgltpnt` = '2024-02-16', `dtglkpnt` = '2029-02-16', `cnosnt` = NULL, `dtglsertifikat` = '2024-02-16', `dtglkadaluarsa` = '2029-02-16' WHERE `cnip` = '198409162014042001'; -- DINI ADIBA SEPTANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10318/087/943/2022', `cnosnt` = NULL WHERE `cnip` = '198411052009122004'; -- DINI INDRAWATI SIMBOLON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07003/185/80/2018' WHERE `cnip` = '198003252008011008'; -- DODY KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03176/185/647/2017' WHERE `cnip` = '197503292009121001'; -- DONIE MARGAVIANTO NURROKHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05065/440/546/2026', `dtgltbnt` = '2026-07-27', `dtglkbnt` = '2031-07-27', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-27', `dtglkadaluarsa` = '2031-07-27' WHERE `cnip` = '198709102015041003'; -- DWI SETIA PERMANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11104/185/947/2019' WHERE `cnip` = '199205122015042001'; -- DYAH CHANDRA PRAMITA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197104032006041001'; -- EKA KHRISTIYANTA PURNAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08606/185/950/2020' WHERE `cnip` = '197310261994031001'; -- EKO JOHAN SARIFUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11093/185/454/2019' WHERE `cnip` = '198504162015042002'; -- ENDANG SRI MURNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09480/031/051/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197104082005012001'; -- ENI PRIHATININGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07225/185/956/2020', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '197710222008122001'; -- ENI SOFIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06389/185/956/2020' WHERE `cnip` = '197403052007101001'; -- ERWIN SAHALA PANGALOAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06604/185/556/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196904061990012001'; -- ESTI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08717/087/253/2026', `dtgltsnt` = '2026-07-07', `dtglksnt` = '2031-07-07', `dtglsertifikat` = '2026-07-07', `dtglkadaluarsa` = '2031-07-07' WHERE `cnip` = '197903302005012002'; -- EVY MARGARETHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04966/185/565/2020' WHERE `cnip` = '198204292014041001'; -- FAIZAL MUAMAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03914/185/967/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198205042006042001'; -- FAJAR NURMALA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03143/185/161/2017' WHERE `cnip` = '198207222010012014'; -- FATMA DEWI FITRIATUS SOLICHAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11103/185/666/2019' WHERE `cnip` = '199202122014041001'; -- FAUZI FIRMANSYAH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09586/087/168/2026', `dtgltsnt` = '2026-07-21', `dtglksnt` = '2031-07-21', `dtglsertifikat` = '2026-07-21', `dtglkadaluarsa` = '2031-07-21' WHERE `cnip` = '197802042005011003'; -- FEBY SUTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07004/185/11/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198108042008102001'; -- FITRI SUMAIRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01722/191/372/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `dtglsertifikat` = '2025-04-10', `dtglkadaluarsa` = '2030-04-10' WHERE `cnip` = '198001222009121002'; -- GEOGY EL THARIQ JAGANEGARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08465/185/973/2018', `cnopnt` = 'PNT-01792/087/979/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = 'SNT-05449/087/972/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198401242014091001'; -- GIGIH ANGGANA YUDA, M.Pd.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11101/185/984/2019', `dtgltbnt` = '2024-12-20', `dtglkbnt` = '2029-12-20', `dtglsertifikat` = '2024-12-20', `dtglkadaluarsa` = '2029-12-20' WHERE `cnip` = '199002262014041001'; -- HARRISWARA AKEDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09139/087/882/2022' WHERE `cnip` = '198008202000031001'; -- HARYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00192/026/082/2017' WHERE `cnip` = '197705102005012002'; -- HERNI MEINARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10308/088/882/2018' WHERE `cnip` = '198301242008011007'; -- HERU ADI NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-001/2021' WHERE `cnip` = '198812252015041005'; -- HUSIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10302/088/096/2018' WHERE `cnip` = '197004091991031002'; -- I DEWA GEDE ALIT WIJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-10348/130/196/2023' WHERE `cnip` = '196812222002122001'; -- INDRA DEWI RIAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01360/088/490/2020' WHERE `cnip` = '198112112009122001'; -- IRMA HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06261/030/015/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197605202005011002'; -- JOKO WAHYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06649/191/015/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198302072007101001'; -- JUFRI RAHMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05118/087/325/2024', `cnosnt` = NULL WHERE `cnip` = '196903231991031004'; -- KARDIYONO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04077/087/028/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197712032001121002'; -- KOSASIH ALI ABU BAKAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-16737/087/324/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197705222005011001'; -- KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02927/191/030/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '198003272009122001'; -- LAILY MUSYRIFAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07061/185/234/2018' WHERE `cnip` = '198608192009122006'; -- LANY FITRIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07062/185/15/2018' WHERE `cnip` = '198008052008102001'; -- LIA RAMADHANIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07063/185/436/2018' WHERE `cnip` = '198011042008121004'; -- LIDO CAHYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01401/087/536/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = 'SNT-08716/440/532/2026', `dtgltsnt` = '2026-07-07', `dtglksnt` = '2031-07-07', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198305092005012002'; -- LILIS DEVIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08818/185/545/2020' WHERE `cnip` = '199502182019021002'; -- MAHDI SHIDDIEQY SETATAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08948/185/949/2020' WHERE `cnip` = '198603202019021004'; -- MARDIYONO PRASETIO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03903/185/345/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198803042014042001'; -- MARISTA RITA SINAGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05180/185/844/2020' WHERE `cnip` = '198904252015042003'; -- MARRISA IMELDA MANURUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00134/191/948/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '199908122020122002'; -- MARSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01266/191/045/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197104081992032002'; -- MARWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08545/185/742/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903172002122001'; -- MAYA DWI INDRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03154/185/543/2017' WHERE `cnip` = '196705071994032002'; -- MEITINA VENTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02214/191/449/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198503082010122004'; -- MERLITA ANGGRAINI PUTRI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02735/087/147/2020' WHERE `cnip` = '196701071992031003'; -- MOHAMAD ALIPI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01259/087/247/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198602062010121005'; -- MUCHLIS MUTTAQIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01265/088/944/2020' WHERE `cnip` = '198410152014041001'; -- MUFTI AULIYA ZULFIQAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00022/088/344/2020' WHERE `cnip` = '198601262010121004'; -- MUHAMMAD ARRAZY MAHMUD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03936/185/141/2018' WHERE `cnip` = '197807182009022001'; -- MUKAROMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10288/185/949/2020' WHERE `cnip` = '198406012019022007'; -- MURNI PERTIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03156/185/955/2017' WHERE `cnip` = '197412232005011002'; -- NANTO NURADHI RIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '00005576/121/3005/114/2024', `cnosnt` = 'SNT-01493/440/257/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198608282018011002'; -- NARWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08952/185/454/2020' WHERE `cnip` = '198007182010122004'; -- NENG MUSTIKA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03937/185/552/2018' WHERE `cnip` = '198107092001122001'; -- NIASARI SURAJI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03157/185/056/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903292003121001'; -- NUGROHO EKO PRASETYO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '197311162005011001'; -- NUR MUHAMMAD TAUFIQ HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03120/185/656/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199108262015042001'; -- NURUL QURTUBI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01363/088/063/2020' WHERE `cnip` = '198810122015042001'; -- OCTAVIANA ATIEK SULISTYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10300/088/474/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196703081994032001'; -- POPON KORIBAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08470/185/079/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196809071988031002'; -- PURWONO WIJAYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00025/088/177/2020' WHERE `cnip` = '198008232005012003'; -- PUTRI WIJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10275/185/215/2020', `cnosnt` = 'SNT-03271/020/213/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '199602232019021001'; -- ASEP AWALUDIN GOZALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10265/185/554/2020' WHERE `cnip` = '197910172005011004'; -- ENDRIS BARENDRIYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00354/191/632/2023', `cnopnt` = 'PNT-15430/020/233/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = 'SNT-02977/020/235/2023', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198607292014042002'; -- LIA SRI HERLIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00152/191/748/2024', `cnopnt` = NULL, `cnosnt` = 'SNT-01240/020/747/2024' WHERE `cnip` = '199509042020121010'; -- MUHAMAD ROBERTO SUNARYA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02975/030/743/2025', `cnosnt` = '051692089010827' WHERE `cnip` = '198608052014041001'; -- MUHAMMAD HARIS ARDANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09133/020/6062021' WHERE `cnip` = '197809202010121002'; -- SEHABUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11284/185/516/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198801262014042001'; -- ANITA IRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-16740/016/598/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198204292006041001'; -- IKHWAN NISOPA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09032/016/944/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198603022010121004'; -- MARIAM TOMY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00789/016/044/2020', `dtgltbnt` = '2025-01-23', `dtglkbnt` = '2030-01-23', `cnosnt` = NULL, `dtglsertifikat` = '2025-01-23', `dtglkadaluarsa` = '2030-01-23' WHERE `cnip` = '199006142014042001'; -- MIKE AYUNINGTIYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01984/050/082/2020' WHERE `cnip` = '197811122006042001'; -- HASMAWATI YUSUF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11721/191/552/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198911242020122007'; -- NOVITA GANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00472/191/703/2023', `cnopnt` = 'PNT-00229/050/703/2023', `cnosnt` = 'SNT-00230/050/705/2023' WHERE `cnip` = '198508152014042001'; -- SISKAWATI NUSI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-10088/050/487/2022' WHERE `cnip` = '198405252014042003'; -- ZUHRIATI A TAHAKU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07337/015/610/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198004222005011001'; -- AFRIYENDY GUSTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08268/012/114/2023', `dtgltpnt` = '2023-09-29', `dtglkpnt` = '2028-09-29', `dtglsertifikat` = '2023-09-29', `dtglkadaluarsa` = '2028-09-29' WHERE `cnip` = '198108222006041002'; -- AGUS KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01497/191/141/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = 'SNT-10999/012/148/2024', `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '197710242005012002'; -- DWI HARYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04975/185/845/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = NULL, `cnosnt` = 'SNT-15187/012/842/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198012072006042003'; -- MARYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-04812/400/645/2024' WHERE `cnip` = '198203302006041003'; -- MHD ZAKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10921/012/543/2021', `cnosnt` = NULL WHERE `cnip` = '197107192005011008'; -- M JUL ADWIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01470/012/452/2018', `cnosnt` = NULL WHERE `cnip` = '198307242006042002'; -- NETI PUJI RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01575/185/298/2019', `dtgltbnt` = '2024-03-15', `dtglkbnt` = '2029-03-15', `dtglsertifikat` = '2024-03-15', `dtglkadaluarsa` = '2029-03-15' WHERE `cnip` = '198505222015042001'; -- RINA MEILISA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00453/012/502/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197202222005011002'; -- SUPRIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05059/012/329/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = 'SNT-', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197710082006041001'; -- TEGUH EKA SETIYABUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03872/191/850/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '198104052009102002'; -- WAGIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09364/185/172/2018' WHERE `cnip` = '198307032006042001'; -- YULIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08934/185/814/2020', `cnopnt` = 'PNT-03034/062/810/2024', `cnosnt` = 'PNT-03034/062/810/2024' WHERE `cnip` = '198206112014041003'; -- ABDUL RAHIM HUSIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08915/185/713/2020', `cnopnt` = 'PNT-02231/087/718/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `cnosnt` = NULL, `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198710012015041001'; -- ABDUL SAFII
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11564/037/217/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198505222003121003'; -- ACHMAD RAMADHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06846/087/714/2023', `cnosnt` = NULL WHERE `cnip` = '197610032003121001'; -- ADE KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03896/185/116/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198404052009102001'; -- AFRIYENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11562/004/915/2021', `dtgltpnt` = '2021-12-23', `dtglkpnt` = '2026-12-23', `cnosnt` = NULL, `dtglsertifikat` = '2021-12-23', `dtglkadaluarsa` = '2026-12-23' WHERE `cnip` = '197208242005011003'; -- AGUS MULIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'Nomor Register: PNT-00597/001/01', `cnosnt` = NULL WHERE `cnip` = '197708082006041002'; -- AGUS PRIATNA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00737/440/817/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198002172005011002'; -- AKHMAD SUSANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11283/185/915/2018', `cnopnt` = 'PNT-08040/063/912/2024', `cnosnt` = 'SNT-08105/063/914/2024' WHERE `cnip` = '197610052003121004'; -- ALBER TANDI DALLA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04118/191/014/2023', `cnosnt` = NULL WHERE `cnip` = '197709162002122001'; -- ALLIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197401012005011003'; -- ALVI RIANTO PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03110/060/615/2023', `cnosnt` = 'SNT-02466/060/618/2024' WHERE `cnip` = '197507162003121001'; -- AMRAN PAMME
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03861/185/418/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197811252005012002'; -- ANAK AGUNG MADE AGUNG SUWANDEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '01140/191/516/2023', `cnopnt` = '07449/051/514/2021', `cnosnt` = '02198/051/510/2022' WHERE `cnip` = '197705152006041002'; -- ANDRIAN PRIYATNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00893/026/810/2016', `cnopnt` = 'PNT-03975/026/814/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-08771/412/813/2024', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197807152002121012'; -- ANDY RAHMADI SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00305/017/018/2016' WHERE `cnip` = '198202172006042001'; -- ANGGRAINI SAPUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '03017/423/811/2023' WHERE `cnip` = '198304032006042002'; -- ANITA YUDISTIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '.', `cnopnt` = NULL, `cnosnt` = 'SNT-00701/049/318/2024', `dtgltsnt` = '2024-01-16', `dtglksnt` = '2029-01-16', `dtglsertifikat` = '2024-01-16', `dtglkadaluarsa` = '2029-01-16' WHERE `cnip` = '199504052019021003'; -- APRILIKASANTO PALITHA HARNADIAN ANANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01495/020/819/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197404122001121003'; -- ARDIANTO BAHTIAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04438/009/819/2022' WHERE `cnip` = '198707152014041002'; -- ARDITO YULIADHI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08971/185/115/2020' WHERE `cnip` = '198608182014041001'; -- ARIE RUMIHIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00678/062/211/2016', `cnopnt` = 'PNT-07988/062/212/2021', `dtgltpnt` = '2026-06-30', `dtglkpnt` = '2031-06-30', `cnosnt` = NULL, `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198806192014042002'; -- ARINI YUNIARTY BUAMONA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03756/017/811/2023', `cnosnt` = NULL WHERE `cnip` = '198810012019021003'; -- ARI OKTAVIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01344/010/412/2019' WHERE `cnip` = '197705052003122003'; -- ARMAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01441/191/110/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '199502052020121009'; -- A R RANIRY A  RAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09084/185/611/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198703172019021002'; -- ARYA ERRI PURWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03837/185/711/2018', `cnopnt` = 'PNT-10541/162/711/2021', `cnosnt` = NULL WHERE `cnip` = '198302132006042003'; -- ARY SETYORINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02667/191/411/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199210022020122011'; -- AYU ANGGEK TRISNAWATI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-18719/001/126/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197610072002121004'; -- BAUN THOIB SOALOON SGR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10109/049/021/2019' WHERE `cnip` = '198503222009101002'; -- BONIFASIUS M RUGIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-03272/039/834/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198005052010122002'; -- CHRISTINA TERENTJE WEKING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11287/185/739/2018' WHERE `cnip` = '197606262005012003'; -- CUT NURLAILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03102/185/946/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197807072002122001'; -- DAHLIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01805/191/344/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '198001132009101002'; -- DANANG EKO PRASETYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04595/185/243/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '197810062006042002'; -- DANTY MULIAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-0627/1087/046/2023', `cnosnt` = 'SNT-05509/087/049/2023' WHERE `cnip` = '198907152015041003'; -- DEDE SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00078/046/245/2025' WHERE `cnip` = '199306222019021005'; -- DEVID TITUS CHRISTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08002/015/340/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198809082014042001'; -- DEWI SEPTI KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05060/440/141/2026', `dtgltbnt` = '2026-07-27', `dtglkbnt` = '2031-07-27', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-27', `dtglkadaluarsa` = '2031-07-27' WHERE `cnip` = '198202092015042001'; -- DEWI SUSILOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03949/191/545/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '198404092015042001'; -- DEWI WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01010/191/942/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = 'PNT-01091/191/941/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = 'SNT-03270/191/942/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198909212019021002'; -- DHANAR WIDYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02168/038/447/2023', `cnosnt` = NULL WHERE `cnip` = '198208152006042001'; -- DIAH RACHMA YUDITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08969/185/042/2020' WHERE `cnip` = '198105152015042001'; -- DIAN AFDIANA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-19704/054/241/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197001221991031001'; -- DIAN PURNAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03514/185/943/2021', `dtgltbnt` = '2026-06-30', `dtglkbnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198406292006042001'; -- DIAN RAHMA FITRA RATRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11763/062/348/2019', `cnopnt` = NULL, `cnosnt` = 'SNT-08510/062/344/2021', `dtgltsnt` = '2021-09-15', `dtglksnt` = '2026-09-15', `dtglsertifikat` = '2021-09-15', `dtglkadaluarsa` = '2026-09-15' WHERE `cnip` = '198610262014042001'; -- DINA ANDANIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03584/191/440/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '198011222006041004'; -- DONI ARIEF RIFHANI HARITS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03931/191/746/2018', `dtgltbnt` = '2023-03-23', `dtglkbnt` = '2028-03-23', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2023-03-23', `dtglkadaluarsa` = '2028-03-23' WHERE `cnip` = '198204212009101002'; -- DWI CAHYANTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '197812082005011003'; -- DWIDAYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03912/185/845/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198001182003121002'; -- DWIJOKO MURSIHONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04372/165/146/2019' WHERE `cnip` = '198108042005012018'; -- DWI PUSPA AGUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-01058/023/054/2023', `dtgltsnt` = '2023-02-01', `dtglksnt` = '2028-02-01', `dtglsertifikat` = '2023-02-01', `dtglkadaluarsa` = '2028-02-01' WHERE `cnip` = '196901222003121001'; -- EDI SARWA SUSILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-01604/015/951/2025' WHERE `cnip` = '198805262014041001'; -- EDWIN DWIJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '05606/191/657/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199207172019021008'; -- EGAR DIKA SANTOSA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02738/185/050/2017' WHERE `cnip` = '197810222003121001'; -- EKO JATMIKO HARIMUDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00157/046/153/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197707282005012001'; -- ELISABET PASOLORAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01711/191/850/202 6', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198805072015042005'; -- EMA LAURA KARETH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00040908/121/3005/114/2022' WHERE `cnip` = '197609102005011001'; -- ENDRY SATYA RAMADHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnosnt` = 'SNT-19986/004/853/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197604102006042001'; -- ENINTA KABAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '196707161998022001'; -- EVA KRISNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08873/191/256/2023', `dtgltbnt` = '2023-12-14', `dtglkbnt` = '2028-12-14', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2023-12-14', `dtglkadaluarsa` = '2028-12-14' WHERE `cnip` = '198107242006042001'; -- EVI SISWANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00049900/121/3005/114/2022' WHERE `cnip` = '198110032006041002'; -- FAJRIL KAMIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01529/185/067/2019' WHERE `cnip` = '198308102003121004'; -- FANDI AGUSMAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08961/400/364/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198402182003121003'; -- FATAHILLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00152/440/668/2026', `cnosnt` = NULL WHERE `cnip` = '197602012003121001'; -- FEBRIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01994/191/863/2025', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199101252019021001'; -- FERDIYANTO IMAMAT RAJANI SUSILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06281/015/367/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198702062010121004'; -- FERI PRISTIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00646/038/966/2017', `cnosnt` = NULL WHERE `cnip` = '197909042005012001'; -- FITRI AHYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08946/185/067/2020' WHERE `cnip` = '197911202008101003'; -- FREDDY JAMES RESITJ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08386/185/685/2020', `cnopnt` = NULL, `cnosnt` = 'BNT-08386/185/685/2020' WHERE `cnip` = '197505182003122008'; -- HADIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11288/185/280/2018' WHERE `cnip` = '198806282014042001'; -- HANIVA YUNITA LEO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08112/185/182/2018' WHERE `cnip` = '198206052015042002'; -- HAPSARI WIRASTUTI SUSETIANINGTYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02739/185/081/2017' WHERE `cnip` = '198211082006041002'; -- HARRY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03900/185/082/2018' WHERE `cnip` = '198707082010122003'; -- HELMINA KASTANYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06094/185/289/2021', `dtgltbnt` = '2021-12-21', `dtglkbnt` = '2026-12-21', `cnopnt` = 'PNT-06634/191/289/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198301282003121002'; -- HENDRA PRIBADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07059/185/981/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-06863/087/983/2023', `dtgltsnt` = '2023-08-01', `dtglksnt` = '2028-08-01', `dtglsertifikat` = '2023-08-01', `dtglkadaluarsa` = '2028-08-01' WHERE `cnip` = '197303152005011002'; -- HENRI RETNADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06642/191/888/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = 'BNT-06642/191/888/2025', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198511122018011001'; -- HERFIN ARIZ WIJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03916/185/889/2018', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '197802012006042003'; -- HERLINA WIDYA WARDANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02760/023/485/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = 'PNT-07574/440/483/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-08720/440/487/2026', `dtgltsnt` = '2026-07-07', `dtglksnt` = '2031-07-07', `dtglsertifikat` = '2026-07-07', `dtglkadaluarsa` = '2031-07-07' WHERE `cnip` = '198303282014041001'; -- HERU BUDI WIJAYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00915/039/085/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198405032014042001'; -- HESTIANI DIAN PUSPITA REBO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03123/419/299/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '199612042020121005'; -- I KOMANG TRI WISNANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02459/191/690/2022', `cnopnt` = NULL, `cnosnt` = 'SNT-06909/004/694/2021', `dtgltsnt` = '2026-06-30', `dtglksnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198308162006042003'; -- INDAH GUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03180/185/592/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198805042014042001'; -- INDAH PUSPITA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04544/191/197/2024', `dtgltbnt` = '2024-07-01', `dtglkbnt` = '2029-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-07-01', `dtglkadaluarsa` = '2029-07-01' WHERE `cnip` = '197912022010122001'; -- INDAH ROSALIA DESYANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06250/004/293/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197712052010121001'; -- INDARTO KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-06691/060/292/2024' WHERE `cnip` = '197912212005012003'; -- INDRIATI, S.E.
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '01-04065-0723' WHERE `cnip` = '199111272019022008'; -- INDRI NOVI HARAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03113/185/198/2017', `cnosnt` = 'SNT-04246/039/196/2024', `dtgltsnt` = '2024-06-30', `dtglksnt` = '2029-06-30', `dtglsertifikat` = '2024-06-30', `dtglkadaluarsa` = '2029-06-30' WHERE `cnip` = '198508282014041001'; -- IRWAN ALFREED PELLONDOU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00738/049/818/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '196901201988121001'; -- JANUAR PRIBADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03901/185/003/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198407012014042001'; -- JULIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11290/185/913/2018' WHERE `cnip` = '197810302008101001'; -- KALVIN BILLY OKTAVIANUS MANOPO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-12653/043/827/2025' WHERE `cnip` = '197902192003122002'; -- KAMBANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01035/038/729/2020', `cnosnt` = NULL WHERE `cnip` = '198212312006042002'; -- KILEP MARIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03184/185/516/2017' WHERE `cnip` = '197805232003121002'; -- KUSMARA JIWANTARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01533/185/712/2019', `cnopnt` = 'PNT-03758/014/723/2024', `dtgltpnt` = '2024-06-30', `dtglkpnt` = '2029-06-30', `cnosnt` = NULL, `dtglsertifikat` = '2024-06-30', `dtglkadaluarsa` = '2029-06-30' WHERE `cnip` = '198109092002121003'; -- KUSNADI LISA PURNAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01041/191/036/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '199109012020122020'; -- LILI ANDRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09117/030/838/2022', `cnosnt` = 'SNT-06262/030/836/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198001182005012001'; -- LINDA CANDRA ARIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-06115/061/233/2021', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198707092014042001'; -- LINDA MARGRET HEUMASSE
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00191/162/331/2025' WHERE `cnip` = '199007252020122013'; -- LISTYA KANDA DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00509/038/044/2019' WHERE `cnip` = '198607092014042002'; -- MADE ANA SUSANTHI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00726/045/345/2017', `cnopnt` = 'PNT-02940/045/345/2021', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198102202006041003'; -- MANGARA SIAGIAN SIREGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09350/087/847/2023' WHERE `cnip` = '196706091990012001'; -- MARGIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00457/049/546/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198807022019022007'; -- MARLA STEFANI LONTOH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04586/191/343/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198808272020122015'; -- MARNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02279/009/640/2017' WHERE `cnip` = '197805062010122002'; -- MAYA SUSANTI TANJUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '1388/2.3.1.2.8/03/03/2009', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197505312005011003'; -- MICHAL DENNIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09365/185/843/2018', `dtgltbnt` = '2023-09-04', `dtglkbnt` = '2028-09-04', `cnopnt` = 'PNT-00138/009/842/2023', `dtgltpnt` = '2023-01-05', `dtglkpnt` = '2028-01-05', `cnosnt` = 'SNT-10563/009/845/2022', `dtgltsnt` = '2022-12-19', `dtglksnt` = '2027-12-19', `dtglsertifikat` = '2023-01-05', `dtglkadaluarsa` = '2028-01-05' WHERE `cnip` = '198311052014041001'; -- MIFTAKHUL AWALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02766/185/741/2017', `cnosnt` = 'SNT-07863/030/744/2022' WHERE `cnip` = '198403112006042001'; -- MITA SARASWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08840/023/340/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198005192006041003'; -- MOHAMMAD YUDI ANANTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198204042006041004'; -- MUHAMMAD ERWIN DARMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06893/408/946/2025', `cnosnt` = NULL WHERE `cnip` = '197402152003121002'; -- MUHAMMAD IRSAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07174/191/749/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '197208192002121001'; -- MUSLIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09848/026/359/2018', `cnopnt` = 'PNT-00523/026/350/2023', `dtgltpnt` = '2023-01-16', `dtglkpnt` = '2028-01-16', `cnosnt` = 'SNT-09168/026/354/2023', `dtgltsnt` = '2023-11-01', `dtglksnt` = '2028-11-01', `dtglsertifikat` = '2023-01-16', `dtglkadaluarsa` = '2028-01-16' WHERE `cnip` = '197903132006042002'; -- NGATIRAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07109/037/557/2024' WHERE `cnip` = '197606062005012001'; -- NI LUH GDE ARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05617/191/359/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197507042006042001'; -- NI LUH WIARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00584/038/457/2020', `dtgltsnt` = '2025-03-27', `dtglksnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198305262006042002'; -- NI WAYAN WIDIARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03938/185/453/2018' WHERE `cnip` = '198202112014042001'; -- NOORMALA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10052/063/958/2024', `dtgltpnt` = '2024-12-31', `dtglkpnt` = '2029-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2024-12-31', `dtglkadaluarsa` = '2029-12-31' WHERE `cnip` = '197704102001122002'; -- NORMAWATI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00346/009/353/2023' WHERE `cnip` = '197911052006042001'; -- NOVIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07066/185/59/2018' WHERE `cnip` = '197711272003121001'; -- NOVRIZAL CHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08822/185/150/2020' WHERE `cnip` = '196702151989022001'; -- NURJANNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09210/191/452/2024', `cnopnt` = 'PNT-03582/060/458/2024', `cnosnt` = NULL WHERE `cnip` = '197904222002122002'; -- NURMIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03919/185/052/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-14696/062/056/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '199211252014042001'; -- NURUL ISTIQAMALLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05750/191/977/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199604282019021004'; -- PALTY ZAINAL SIBARANI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '198405262014041001'; -- PANGKUL FERDINANDUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02744/185/877/2017' WHERE `cnip` = '197905162005012003'; -- PERGAWA ADHIANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-04908/043/971/2023' WHERE `cnip` = '197709062002121003'; -- PINO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '1000/2.3.1.2.8/03/00/2015', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198006262005012005'; -- PONIRAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02561/191/674/2022', `cnosnt` = 'SNT-00519/009/675/2025' WHERE `cnip` = '199212022020121021'; -- PRADUAN F L TORUAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03123/185/079/2017' WHERE `cnip` = '198710222014042001'; -- PRINCESS ALBERTA DEWI WIJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11236/046/593/2024' WHERE `cnip` = '198208162014041002'; -- RAHMAD HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12648/054/291/2018' WHERE `cnip` = '197804212006042001'; -- RATNA B
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03193/185/896/2017' WHERE `cnip` = '198306292008012004'; -- RATNA PERWITOSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07741/416/699/2022', `cnosnt` = NULL WHERE `cnip` = '197605262006041002'; -- REBDA AGUS PRABOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03473/185/997/2018', `cnosnt` = 'SNT-08380/046/999/2021' WHERE `cnip` = '198510232014042002'; -- RETNO DAMAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-10858/015/592/2024' WHERE `cnip` = '198110232010122003'; -- RIA ANGGRAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02804/185/594/2021', `cnopnt` = NULL, `cnosnt` = 'SNT-07971/063/594/2024', `dtgltsnt` = '2024-09-23', `dtglksnt` = '2029-09-23', `dtglsertifikat` = '2024-09-23', `dtglkadaluarsa` = '2029-09-23' WHERE `cnip` = '197703172005011004'; -- RINALDO MARKUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnosnt` = 'SNT-00518/008/894/2025' WHERE `cnip` = '198204042006042001'; -- RINDA LUVIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03940/185/396/2018' WHERE `cnip` = '197405252001122001'; -- RITA NOVITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02770/185/096/2017' WHERE `cnip` = '196805291990031001'; -- R. SETYA BUDI HARYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00131/191/595/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '198108172003121002'; -- RUSTAM SAMAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02748/185/601/2017', `dtgltbnt` = '2022-12-16', `dtglkbnt` = '2027-12-16', `cnopnt` = NULL, `cnosnt` = 'SNT-00458/440/607/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2022-12-16', `dtglkadaluarsa` = '2027-12-16' WHERE `cnip` = '199001152015042002'; -- SEKAR PINASTIKA WIDODO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-11029/022/303/2024' WHERE `cnip` = '198007082002121004'; -- SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09102/185/702/2020', `cnosnt` = 'SNT-09134/060/707/2021' WHERE `cnip` = '198105302006042001'; -- SITI HAJARAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01803/191/902/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198904262019022007'; -- SITI MASITOH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07773/191/604/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198210142003122001'; -- SITI RAJANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02511/087/109/2023', `cnosnt` = 'SNT-07463/087/100/2023' WHERE `cnip` = '197902122003122004'; -- SITI SULASTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03924/185/308/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197105282003122001'; -- SRI ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00395/191/507/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `cnopnt` = NULL, `cnosnt` = 'SNT-09721/026/509/2022', `dtgltsnt` = '2022-11-21', `dtglksnt` = '2027-11-21', `dtglsertifikat` = '2022-11-21', `dtglkadaluarsa` = '2027-11-21' WHERE `cnip` = '197508142005012002'; -- SRI ERNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-12367/087/909/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197308102005012001'; -- SRI HARYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02701/185/200/2017' WHERE `cnip` = '198504052014042001'; -- SRI LISTYANA VIDYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00170/026/508/2017', `dtgltbnt` = '2022-10-25', `dtglkbnt` = '2027-10-25', `cnopnt` = NULL, `cnosnt` = 'SNT-06019/026/506/2023', `dtgltsnt` = '2023-07-04', `dtglksnt` = '2028-07-04', `dtglsertifikat` = '2023-07-04', `dtglkadaluarsa` = '2028-07-04' WHERE `cnip` = '197401302003121003'; -- SRI WIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11293/185/406/2018', `cnosnt` = NULL WHERE `cnip` = '197408142005012004'; -- ST.RAHMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08944/185/105/2020' WHERE `cnip` = '197210012006042001'; -- SUHARTINI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05787/087/707/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197406282005011001'; -- SUKAMTO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-01603/022/600/2025' WHERE `cnip` = '197302132002121001'; -- SULAEMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-0356/191/604/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197908202005012002'; -- SUSI NURALIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-10447/045/906/2021' WHERE `cnip` = '197806172002121003'; -- SUYATNO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197012152005011002'; -- SYAIFUL BAHRI LUBIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08368/191/125//2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197605302002122002'; -- TAHTIHA DARMAN MOENIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09362/185/320/2018', `cnopnt` = 'PNT-10083/017/322/2022', `cnosnt` = 'SNT-09611/017/327/2022-' WHERE `cnip` = '198204272006042001'; -- TIKA WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06789/017/020/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197811122003122001'; -- TIURMA SITUMEANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03429/440/728/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198002252009121003'; -- TRI INDIRA S.P
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10298/185/730/2020', `cnopnt` = 'PNT-03622/421/733/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198203222010122001'; -- UMI AHDIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08958/185/540/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199008172019022005'; -- VERA AGUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02711/191/241/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199504222019021003'; -- VIDI AFRINELDI VENDLAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03480/185/855/2018' WHERE `cnip` = '197905252006041003'; -- WAHYU AJI WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08937/185/457/2020', `cnosnt` = 'SNT-07862/030/453/2022' WHERE `cnip` = '197508222006041001'; -- WILLIBRORDUS ARI WIDYAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10253/185/471/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199001132019022003'; -- YANUARIA SABATINI PUNUF
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-14695/087/775/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198002162005012002'; -- YESSY ROSALINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03909/185/971/2018' WHERE `cnip` = '197807072003122001'; -- YULFI ZAWARNIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03943/185/379/2018', `cnopnt` = 'PNT-06214/061/373/2021', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '199101112014042001'; -- YULIAN AMALIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07074/185/78/2018' WHERE `cnip` = '196807242003122001'; -- YULIA RISKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06363/185/388/2020' WHERE `cnip` = '198305072009101003'; -- Z A E N U D D I N
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03620/008/181/2021' WHERE `cnip` = '197007072002121001'; -- ZIHAMUSSHOLIHIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06679/185/488/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197809282005011002'; -- ZULFAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04653/191/588/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199007182014041001'; -- ZULFAN USMAN TOEKAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06863/009/083/2018', `cnosnt` = NULL WHERE `cnip` = '197605112005012001'; -- ZURYETTI MUZAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02185/054/116/2017', `cnosnt` = '-' WHERE `cnip` = '196903091990031002'; -- ABDUL MALIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01313/088/618/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198604262014041002'; -- ABDUL QADIR HASSAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09869/191/712/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198610022009111001'; -- ACHMAD MISWAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04844/185/010/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199807242018122001'; -- AGHNIA NUR SALMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02334/042/112/2017', `cnosnt` = 'SNT-08413/042/116/2021' WHERE `cnip` = '199002192014041001'; -- AGUNG YUDANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06833/001/610/2023', `cnosnt` = 'SNT-02929/001/612/2023' WHERE `cnip` = '198303112008021003'; -- AHMAD HARIRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01809/185/418/2019' WHERE `cnip` = '198512172011011008'; -- AHMAD ZUNITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02753/185/117/2017' WHERE `cnip` = '198105252006051001'; -- AKHMAD ANSHAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04186/185/019/2018' WHERE `cnip` = '198101282008121002'; -- AL FENDRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04187/185/310/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198206252014041001'; -- AMANDA JUNIAR FIRDIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01912/050/413/2017' WHERE `cnip` = '197901162009122001'; -- ANITA SASUWUHE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06538/185/412/2020' WHERE `cnip` = '197707212006052001'; -- ANNI FERSARI JULI HAREFA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '021902294031852', `cnosnt` = NULL WHERE `cnip` = '197409152005021001'; -- ANTON HARIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07436/191/410/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '198610092015042001'; -- AREKA PRATIWI PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03100/185/514/2017' WHERE `cnip` = '198104112015042001'; -- ARIE SETYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01816/185/616/2019' WHERE `cnip` = '198704162015042004'; -- ARIESKA APRILIANTI UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00041557/121/3005/114/2022', `cnosnt` = NULL WHERE `cnip` = '198805082019022008'; -- ARINI YULITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02619/191/118/2024' WHERE `cnip` = '199407012020122026'; -- ARLIA BHAYANGKARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02732/185/614/2017' WHERE `cnip` = '196504291994031001'; -- ARSIH WIJAYA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '081802909023045' WHERE `cnip` = '198703182014042001'; -- ASIH MARNI SETIANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04324/098/613/2019' WHERE `cnip` = '196809121990032001'; -- ASIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03865/185/012/2018' WHERE `cnip` = '198210272014041001'; -- ASRI HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07001/185/418/2018' WHERE `cnip` = '198401292015042001'; -- ATIKA AYUNINGTYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04272/185/325/2020', `cnopnt` = 'PNT-01538/014/327/2024', `cnosnt` = 'SNT-07469/014/326/2024' WHERE `cnip` = '198312092007011001'; -- BAYU SATRIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00747/012/28/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198410092009121004'; -- BRAM ISWANTO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-06110/061/628/2021' WHERE `cnip` = '198905222014042001'; -- BRISIT ESTER BOROLLA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04188/185/221/2018', `cnosnt` = NULL WHERE `cnip` = '197003111998021001'; -- BUDI KRISTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03073/042/923/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197204241991031001'; -- BUSRAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '197807312005021001'; -- CHARLES CLIFORD NANLOHY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01811/185/831/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198205212011012005'; -- CHUNJUNARSI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00298/001/639/2023', `cnosnt` = NULL WHERE `cnip` = '197808032006052001'; -- CUT ZAHRINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07002/185/749/2018' WHERE `cnip` = '198608232015092001'; -- DAME ROHANA GUSTIANI PANJAITAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-0050/185/647/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198405092014102001'; -- Debby Aristi Sikopa
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05366/185/440/2020' WHERE `cnip` = '198412182008021001'; -- DEBRIAN PRAKASIDHI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00023043/121/3005/114/2024' WHERE `cnip` = '198012172014042002'; -- DESSY PATRICIA FLORIBERTHA DONGGORI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03866/185/643/2018' WHERE `cnip` = '198312202009122003'; -- DESSY WAHYU UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01803/185/642/2019' WHERE `cnip` = '199211212018012001'; -- DEWI YIBTA NARIASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06279/020/444/2018' WHERE `cnip` = '197004031991032003'; -- DIAH NURJANAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-10757/087/840/2022' WHERE `cnip` = '199107012019022007'; -- DIAH WIDIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03839/185/243/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198709262014042001'; -- DIAN EKA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00278/030/340/2016', `cnopnt` = NULL WHERE `cnip` = '198701252011012011'; -- DIAN SARI DEWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01807/185/146/2019' WHERE `cnip` = '198507102018011002'; -- DIDIK YAHYA PERMANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09092/185/040/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198912282015042004'; -- DINDAWATI FATIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04189/185/142/2018' WHERE `cnip` = '198609172014041001'; -- DODIE MARRIO TIWERY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04190/185/844/2018' WHERE `cnip` = '198205032011012012'; -- DUWININGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07056/185/88/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197405111993032001'; -- DWI ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08577/185/747/2018' WHERE `cnip` = '196706171992031001'; -- DWI SUDARWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT 06437/112/240/2022', `cnosnt` = 'SNT-03097/112/249/2022' WHERE `cnip` = '197907182007011003'; -- DWI WAHYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06303/030/942/2018' WHERE `cnip` = '198408182006052001'; -- DYAH WINARNI PUSPASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '029375 / 021792695003830', `cnosnt` = NULL WHERE `cnip` = '197009261996011001'; -- EDI IRAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01097/148/557/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197908202005021001'; -- EDY BUDIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'SKP-00034/2.31.2.142.R/03/03/202', `cnosnt` = NULL WHERE `cnip` = '196308051985031001'; -- EDY SUWARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04191/185/655/2018' WHERE `cnip` = '197402032007011005'; -- EKA PURWANTO HERU SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02679/185/354/2017' WHERE `cnip` = '198507212009122005'; -- EKA YULIANTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08578/185/058/2018' WHERE `cnip` = '198902102015042005'; -- EMMA REJEKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06326/020/257/2018', `cnopnt` = NULL WHERE `cnip` = '196903131989031001'; -- ENDANG HASAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03108/185/252/2017' WHERE `cnip` = '198208042015042001'; -- ERNI KOMALASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03934/185/859/2018', `cnosnt` = NULL WHERE `cnip` = '198606082009022005'; -- ESTERINA FITRI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02681/185/457/2017' WHERE `cnip` = '196604171988032001'; -- ETTY ARIESTIAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01518/030/255/2017' WHERE `cnip` = '199004172014042001'; -- EVI APRIYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04192/185/266/2018', `cnosnt` = NULL WHERE `cnip` = '197512252009021001'; -- FAJAR SUBEKHI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '198302012011012008'; -- FARIDA ARSIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '05533/191/266/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198411082014042001'; -- FATHIMAH SAFARIAH, S.E., M.Ak
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03743/191/567/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199607122018121001'; -- FAZHAM FATHONI FADIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11088/185/468/2019' WHERE `cnip` = '197902152008032001'; -- FERAWATI ALEX
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07058/185/60/2018' WHERE `cnip` = '198310222009021004'; -- FIDER TENDIARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04193/185/987/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197611222005012012'; -- HAJAR DJAFAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '196701131992031001'; -- HALIL BAHRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04194/185/188/2018', `cnopnt` = '101105119669713', `cnosnt` = NULL WHERE `cnip` = '197612232005021001'; -- HANY YULIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08663/009/683/2023' WHERE `cnip` = '198009182009021001'; -- HARIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00469/039/389/2024', `cnosnt` = NULL WHERE `cnip` = '197207072000031001'; -- HARIS BUDIHARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03147/185/385/2017' WHERE `cnip` = '197909172005021001'; -- HARI SUPONO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '196511141990031002'; -- HARRY TRISATYA WAHYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02034/010/889/2017' WHERE `cnip` = '198106212006052002'; -- HARTATI SAFITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03870/185/588/2018' WHERE `cnip` = '196709211990032001'; -- HASBIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01384/009/686/2019' WHERE `cnip` = '197202231992032001'; -- HASZANYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11092/185/283/2019', `cnopnt` = NULL, `cnosnt` = '0196/2.3.1.2.30/03/00/2018' WHERE `cnip` = '198405142011011010'; -- HENDRA GUNAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04581/191/388/2023', `cnopnt` = 'PNT-00169/042/386/2023', `cnosnt` = 'SNT-07478/042/386/2023' WHERE `cnip` = '198901232015041001'; -- HENDRA SIDIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05629/185/182/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199306302019021004'; -- HERU SUDRAJAD PANGESTU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00040824/121/3005/114/2022' WHERE `cnip` = '199509302019021003'; -- HIDAYATUL WILDAN NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0651/2.2.0.0.1/03/16/2011', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196801051989031001'; -- IBRAHIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00677/037/790/2017' WHERE `cnip` = '197009101991031001'; -- I KETUT LATRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04195/185/799/2018' WHERE `cnip` = '196712011990031002'; -- I MADE DEYANA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00017959/121/3005/114/2023' WHERE `cnip` = '197406012005021001'; -- I MADE SUDAYASA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03845/185/690/2018' WHERE `cnip` = '199010152015041002'; -- IMRAN DANIAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00875/148/390/2019', `cnosnt` = NULL WHERE `cnip` = '198603062009122002'; -- INDIAH RETNOSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10292/185/094/2020' WHERE `cnip` = '196701151992032001'; -- INSANI SUCIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00264/088/992/2018', `cnopnt` = 'PNT-02889/054/997/2022' WHERE `cnip` = '198302242009121003'; -- IRWAN SAHABUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09098/185/196/2020' WHERE `cnip` = '199301172019022011'; -- IVO GIOVANNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-03761/039/597/2024' WHERE `cnip` = '199102122014041001'; -- I WAYAN ADI MAHENDRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04196/185/790/2018' WHERE `cnip` = '196412311990031001'; -- I WAYAN WIJANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03997/185/708/2020', `cnopnt` = NULL WHERE `cnip` = '199707042018122002'; -- JULIE INDAH FAJRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01400/009/905/2019' WHERE `cnip` = '196806091991032002'; -- JUNAIDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03846/185/901/2018' WHERE `cnip` = '197801212007011001'; -- JUNAIDI ABDILLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04199/185/913/2018' WHERE `cnip` = '197509172006051001'; -- KHAIRUL AFDHAL Z
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06941/112/320/2022', `cnosnt` = NULL WHERE `cnip` = '198101212009121001'; -- KHANIFUDIN MALIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06480/030/418/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-04179/030/421/2024' WHERE `cnip` = '198304182006052001'; -- KHARISMA WIDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03841/185/716/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198305292010122002'; -- KIKI AMAYLIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01009/020/610/2016' WHERE `cnip` = '198608222009112001'; -- KIKI RIZQI AGUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08579/185/019/2018' WHERE `cnip` = '198205052014041001'; -- KURNIADI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197205132000032001'; -- KURNIAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01804/185/433/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110312009022006'; -- LAELI FITRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01857/115/431/2017' WHERE `cnip` = '197509122006052001'; -- LILIS RETNOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03847/185/432/2018' WHERE `cnip` = '197501102006052001'; -- LISMA. S
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08935/185/235/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199210282019021005'; -- LIYON SAGITRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04325/191/134/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199305222019022010'; -- LUDHYANA MARTASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06284/185/330/2020', `cnosnt` = NULL WHERE `cnip` = '197802152011011004'; -- LUTHFI ARDIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01814/185/944/2019' WHERE `cnip` = '198011272015042001'; -- MADE SRI MAHARANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04200/185/246/2018' WHERE `cnip` = '198404152015042001'; -- MAGDALENA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-04923/426/948/2024' WHERE `cnip` = '197710222006052001'; -- MAGRITA SILVANA TILAAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00340/088/247/2018' WHERE `cnip` = '198203272011012004'; -- MARGARETHA KURNIAWATY S
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04201/185/047/2018' WHERE `cnip` = '196907171993031002'; -- MASUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02689/185/145/2017' WHERE `cnip` = '198605202005022001'; -- MEIGAWATI NUR ANGGRAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05631/185/845/2020' WHERE `cnip` = '196306121986031004'; -- MELKIANUS MANGGAPROW
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01808/185/647/2019', `cnopnt` = 'BNT-01808/185/647/2019' WHERE `cnip` = '198310312018011001'; -- MOCHAMMAD AZIS EFENDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01739/042/840/2020', `cnosnt` = NULL WHERE `cnip` = '197409172008021001'; -- MOCH ANDRI WP
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00166/011/843/2019' WHERE `cnip` = '198210252009021003'; -- MUHAMMAD HANIF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04264/001/646/2023', `cnosnt` = 'PNT-04264/001/646/2023' WHERE `cnip` = '198412102011011006'; -- MUHAMMAD LIYANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01815/185/045/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197207041994121001'; -- MUHAMMAD SYAHROMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02036/001/641/2022' WHERE `cnip` = '197812082011012006'; -- MUHARNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06552/088/948/2018' WHERE `cnip` = '197001011991031001'; -- MUHYOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03874/185/542/2018', `cnosnt` = NULL WHERE `cnip` = '198203022014041001'; -- MUKAS NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02767/185/242/2017' WHERE `cnip` = '198202192009122003'; -- MUNARI NURLATIEFAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10249/185/156/2020' WHERE `cnip` = '198709252014042001'; -- NAIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04202/185/958/2018' WHERE `cnip` = '199210252014042001'; -- NIKEN AYU SETYONINGTYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03850/185/956/2018' WHERE `cnip` = '196810041993032001'; -- NILLA AYU GUMBIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11100/185/553/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198906022015041001'; -- NUGRAHIR RIZKA GUSTIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '021104125586723', `cnosnt` = NULL WHERE `cnip` = '196811011998021005'; -- NUJUL KRISTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04264/191/056/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199305032019022011'; -- NUR IRSYAKDIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01802/185/751/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198611012009122005'; -- NUR LINA CHUSNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01806/185/255/2019', `cnopnt` = NULL WHERE `cnip` = '199205062018012001'; -- NURUL AINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03937/185/452/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199310252019022007'; -- NURYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03189/185/251/2017' WHERE `cnip` = '197208232006052002'; -- NURYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10269/185/168/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198308202005021001'; -- ONE GUSMAN TRIATMAJA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05122/408/770/2024' WHERE `cnip` = '198312212009121004'; -- PAHADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02352/001/572/2022', `cnosnt` = NULL WHERE `cnip` = '198003042006051003'; -- PIET RUSDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01819/185/179/2019' WHERE `cnip` = '198312162014042001'; -- PRATIWI NATALIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01805/185/174/2019' WHERE `cnip` = '198308112011012009'; -- PUTRI HARYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04203/185/879/2018' WHERE `cnip` = '198911092014042001'; -- PUTRI SEKAR AYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01818/185/698/2019' WHERE `cnip` = '198904052014042001'; -- RAHMA DONA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03192/185/695/2017' WHERE `cnip` = '197701012007011007'; -- RAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00912/046/092/2016', `cnopnt` = 'PNT-10370/191/091/2024', `cnosnt` = NULL WHERE `cnip` = '197906082011011001'; -- RANA KIRANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08825/185/893/2020' WHERE `cnip` = '198307192009122002'; -- RATNA SARI DEWI M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07824/001/991/2022' WHERE `cnip` = '197204242006051005'; -- RAZALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01812/185/492/2019' WHERE `cnip` = '198511182014042001'; -- RETNO AMBARSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08581/185/692/2018' WHERE `cnip` = '198611282015042003'; -- RIA ABAJTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04204/185/290/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199103092015041001'; -- RICHARD ANTONI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01269/191/198/2022', `cnopnt` = 'PNT-00139/001/193/2023', `cnosnt` = 'SNT-06020/001/198/2022' WHERE `cnip` = '198904282019022007'; -- RIFQI ARIFAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04205/185/991/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196501251985032002'; -- RINI RACHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06657/011/994/2018', `cnosnt` = NULL WHERE `cnip` = '197007231991032002'; -- RITA NOFIARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04856/185/993/2020' WHERE `cnip` = '198602122014041001'; -- RIYAN VERDIYANSAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06714/191/498/2022', `cnopnt` = 'PNT-11357/001/497/2021', `cnosnt` = 'SNT-04554/001/498/2022' WHERE `cnip` = '198104292014041001'; -- RIZAL FAHMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07070/185/094/2018' WHERE `cnip` = '198406202009022008'; -- RIZKI AYU RAMADHANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00041517/121/3005/114/2022', `cnosnt` = NULL WHERE `cnip` = '199508102019022010'; -- RIZKY MAULINA PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05912/185/897/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198701022019022004'; -- ROHANITA HANDARIA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00231/050/196/2023' WHERE `cnip` = '197009231998022001'; -- ROSALINA RAMBUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01973/185/590/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198707212014042002'; -- ROSALINA ZWEIDHIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09124/191/296/2023', `cnopnt` = NULL, `cnosnt` = '0011/F7.17/TP.00.00/2022' WHERE `cnip` = '197301012007012005'; -- Rosdiana Kembong, S.E
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-04122/422/299/2021' WHERE `cnip` = '197804122011012003'; -- ROSDYANA, S.Kom., M.M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01813/185/093/2019' WHERE `cnip` = '198501062009021001'; -- ROY DEVIDTON SILALAHI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02747/185/290/2017' WHERE `cnip` = '196710261991031001'; -- RUHADI ANGGARA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00028009/121/3005/114/2021' WHERE `cnip` = '197505052009022007'; -- RUSMIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03877/185/905/2018', `cnosnt` = 'SNT-03129/001/905/2023' WHERE `cnip` = '197703112011011003'; -- SALYA RUSDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08539/185/005/2020' WHERE `cnip` = '197601242006052001'; -- SANTY NURLETTE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04207/185/803/2018' WHERE `cnip` = '198509242008022001'; -- SEFIANI ROZALINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01810/185/400/2019' WHERE `cnip` = '198807102018032001'; -- SELLY PARAMITHA EKASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02749/185/102/2017' WHERE `cnip` = '198510162014042001'; -- SITI HAFSOH SHOPARINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01025/020/408/2016' WHERE `cnip` = '198201032005022001'; -- SITI IDA ROAIDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08582/185/403/2018' WHERE `cnip` = '197903142015042001'; -- SITI NURAHMILAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04208/185/604/2018' WHERE `cnip` = '197702192008122001'; -- SITI NURHANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08915/191/603//2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198903152014042002'; -- SIWI RETNO WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03854/185/000/2018' WHERE `cnip` = '197509092007102001'; -- SIYAMTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03947/185/703/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198507252014042001'; -- SORAYAH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '196501161988032002'; -- SRI HARNINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08583/185/904/2018' WHERE `cnip` = '196712121988032001'; -- SRI MUHAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01012/020/604/2016' WHERE `cnip` = '197609132009022002'; -- SRI MULYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03878/185/306/2018' WHERE `cnip` = '197309042003122001'; -- SRI MULYANI ANDRIYANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01940/030/304/2024' WHERE `cnip` = '197108252005022001'; -- SULISTIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03879/185/807/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197306201999031001'; -- SUPARMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01892/191/600/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199011142014042001'; -- SUSILOWATI TRI HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12999/115/100/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197809252005022001'; -- SUSI SULISTYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02671/115/906/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197512222008121001'; -- SYAMSUL MU`IN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01425/191/922/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198708062015041001'; -- TANTRA EKO PRAKASTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02606/191/224/2022', `cnopnt` = NULL, `cnosnt` = 'SNT-00297/001/228/2023' WHERE `cnip` = '199212262019021006'; -- TEUKU RIJALUL FIKRY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09729/088/427/2018' WHERE `cnip` = '198509022014041001'; -- THAMRIN JUNAIDI NADAPDAP
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10303/185/227/2020' WHERE `cnip` = '198006262014042001'; -- TH. ESTI WURYANSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03856/185/722/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198305012009121003'; -- TRIZA GALIH GUMILANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03130/185/337/2017' WHERE `cnip` = '198912122015042003'; -- UMI WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00414/191/549/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199201032015042001'; -- VELA ZUHARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02752/185/646/2017' WHERE `cnip` = '197908022014041001'; -- VICKY ARIA HUTANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04620/185/742/2020' WHERE `cnip` = '197007121992032001'; -- VONNY LILY MATHEOS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04210/185/257/2018' WHERE `cnip` = '197010132000032001'; -- WAHYU LISTIYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03093/185/115/2017' WHERE `cnip` = '197504052006041001'; -- ABDUL MANAP
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03974/087/213/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-09883/087/218/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198511252009121007'; -- ACHMAD MAULANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02311/087/017/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197809152001121001'; -- ADE FAISAL PENA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06129/088/718/2018' WHERE `cnip` = '197605272005012001'; -- ADE TANTRI MELANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07050/185/012/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198910022014041002'; -- ADITYO PRAYOGO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03835/185/819/2018' WHERE `cnip` = '197204142005011002'; -- ADRYANTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10347/172/015/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = 'SNT-09882/087/017/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198410072008011003'; -- AGUNG SUDERAJAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01412/088/018/2017' WHERE `cnip` = '198211262008011008'; -- AGUS DWI PRAYITNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01665/087/918/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198601312014091001'; -- AGUS JANURI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02312/087/618/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '199103212015042001'; -- AISYAH NUR FATHINAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08478/185/817/2018' WHERE `cnip` = '198812272010122006'; -- ALDINA FARMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03289/185/912/2020' WHERE `cnip` = '199309082015042002'; -- AMELIA WAHYU PUSPITANINGTYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-12477/087/111/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197309022006042001'; -- ANA BUDI KUSWANDANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03099/185/411/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197810172005011002'; -- ANANG RAHARDHANANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02570/191/714/2023', `cnopnt` = 'PNT-01088/087/717/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198703182014041001'; -- ANDAR SUHANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11096/185/417/2019' WHERE `cnip` = '198609292009121005'; -- ANDRIA KUSUMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02159/088/717/2017', `cnopnt` = 'PNT-03973/087/712/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-09884/087/719/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '199107192014042001'; -- ANDRI SETIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05927/020/213/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197706022002121002'; -- ANDRI WAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01963/030/219/2023', `cnosnt` = NULL WHERE `cnip` = '197712142006042001'; -- ANITA LISTYOWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01910/030/511/2013' WHERE `cnip` = '197703172001122001'; -- ANNA TRI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00037/191/610/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198911072020122011'; -- ARDIANY KUSUMA WIJAYA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02309/087/814/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198312132008122001'; -- ARIANDARU WUSDIANINGGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06272/185/017/2020' WHERE `cnip` = '197002012002121001'; -- ARI MULYOTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00238/022/613/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198101062010121001'; -- ARI NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08408/185/210/2018' WHERE `cnip` = '198308212010121004'; -- ARIS WIDIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06208/088/016/2018', `cnosnt` = NULL WHERE `cnip` = '197105161992031001'; -- ASEP SETIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03173/185/814/2017', `cnopnt` = 'PNT-08395/087/815/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197806072006041002'; -- ASRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08806/028/222/2021', `dtgltpnt` = '2026-06-30', `dtglkpnt` = '2031-06-30', `cnosnt` = 'SNT-07186/028/222/2022', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198511162010121007'; -- BAMBANG PUJADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09885/087/220/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '196811151988031001'; -- BUDI SUSANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01898/028/06/2017' WHERE `cnip` = '197510162003121003'; -- BUDI SUSANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03838/185/142/2018', `cnopnt` = 'PNT-04903/087/146/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198407202014041001'; -- DEAN LEONARD HASOLOAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09367/185/445/2018' WHERE `cnip` = '198508122009122004'; -- DEARNI DEWI HASIANY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06622/191/946/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '197704292014091001'; -- DENI HENDRIATNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01693/087/749/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197809302006041001'; -- DENNY ARIFIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07131/430/642/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198306092008011005'; -- DIANSA GUNADI THAIB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00863/030/747/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197906052003122002'; -- DIAN YUNITARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09704/087/140/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198204252009121004'; -- DICKY MARTONO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09478/087/748/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '199112042014041001'; -- DIDIK BIANTORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03898/185/648/2018', `cnopnt` = 'BNT-03898/185/648/2018', `cnosnt` = NULL WHERE `cnip` = '198412102010011011'; -- DIDO SUJAYA PERWEDHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02895/087/944/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197712112005011004'; -- DUDI RUHYADI MUHARAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-BNT-03886/191/155/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197005182007011001'; -- EDI PURWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03867/185/254/2018' WHERE `cnip` = '196803141990031006'; -- EDY MINARNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07592/087/453/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197312011998032001'; -- ENDANG SETIAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10348/172/556/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198209062008012012'; -- ENENG SITI SAADAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03613/191/353/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `cnopnt` = NULL, `cnosnt` = 'SNT-04248/019/358/2024', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '197708292002122001'; -- ERNA PUSPITASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00254/022/651/2017' WHERE `cnip` = '198110152014042003'; -- ERNA RACHMAWATI THOLIB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04091/185/564/2018' WHERE `cnip` = '198612082010121005'; -- FAJAR SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06789/191/560/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `dtglsertifikat` = '2023-10-02', `dtglkadaluarsa` = '2028-10-02' WHERE `cnip` = '198209242010122003'; -- FATMA LUVY PURBORINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04177/087/389/2023', `cnosnt` = NULL WHERE `cnip` = '198004102006041002'; -- HADI WURYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08463/185/081/2020' WHERE `cnip` = '198005162006041018'; -- HENDRAYATNA PRAWIRANEGARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04135/191/583/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198411292009101002'; -- HERU TEGUH PURNOMO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-19632/087/741/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '196603111992031003'; -- HIZZUL AHMEDDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02763/185/298/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197206162002121002'; -- I KETUT MULIARTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01531/185/390/2019' WHERE `cnip` = '198408212002122004'; -- IKLIMA PILA SOPIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06470/191/797/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `dtglsertifikat` = '2023-10-02', `dtglkadaluarsa` = '2028-10-02' WHERE `cnip` = '199104032015042001'; -- IMAH PUSPITASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06685/032/895/2019' WHERE `cnip` = '198306292006042003'; -- INDAH KURNIA RATRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04731/191/495/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198101042009122002'; -- INDRI ASTUTI IRMALITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06481/191/799/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2023-10-02', `dtglkadaluarsa` = '2028-10-02' WHERE `cnip` = '199207182015041001'; -- INOVASI AMALI HUSNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02765/185/710/2017' WHERE `cnip` = '196803192005011002'; -- KASID
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09705/087/241/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '196906011998031001'; -- KASIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10306/088/910/2018' WHERE `cnip` = '198212062014091001'; -- KOEN ADI SURYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07259/185/533/2020', `cnopnt` = NULL, `cnosnt` = 'SNT-03265/032/536/2024' WHERE `cnip` = '198108082006042002'; -- LAILY RAHMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02174/191/534/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198707122010122004'; -- LARASSARI KUSUMANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05106/087/332/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198204092006042002'; -- LESTARI PUSPITANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-02083/087/333/2022' WHERE `cnip` = '197008262001122001'; -- LILIK FATCHURIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09587/087/539/2026', `dtgltsnt` = '2026-07-21', `dtglksnt` = '2031-07-21', `dtglsertifikat` = '2026-07-21', `dtglkadaluarsa` = '2031-07-21' WHERE `cnip` = '198003222006041001'; -- LUKMANUL HAKIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06050/087/031/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197501072005011004'; -- LULUS RAHARJANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05635/182/549/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198005022003121002'; -- MAIMUN RIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03031/028/147/2020', `cnopnt` = 'PNT-00953/028/047/2024', `dtgltpnt` = '2024-01-22', `dtglkpnt` = '2029-01-22', `cnosnt` = NULL, `dtglsertifikat` = '2024-01-22', `dtglkadaluarsa` = '2029-01-22' WHERE `cnip` = '198603212010121002'; -- MANIK ADI PRAKOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08486/185/046/2018', `cnosnt` = NULL WHERE `cnip` = '196710061988031002'; -- MARJANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07897/087/741/2022' WHERE `cnip` = '198410042015042002'; -- MEGAWATI DIANING ARIESSANTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02690/185/547/2017' WHERE `cnip` = '199104012015042002'; -- MENIK FITRIYANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09931/087/842/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197611032000032001'; -- MILA NOVITA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03856/087/642/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197905052006041003'; -- M NOER SHOLIHIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02370/032/142/2020', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197302272002121006'; -- MOHAMAD NASIKH LIL SIDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01050/191/846/2024', `cnopnt` = 'PNT-03855/087/841/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-02728/087/849/2020', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197702022005011001'; -- MOHAMMAD AMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01590/185/945/2019' WHERE `cnip` = '197106231992031001'; -- MOHAMMAD RAFIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08899/191/144/2023', `dtgltbnt` = '2023-12-14', `dtglkbnt` = '2028-12-14', `cnopnt` = 'PNT-09748/440/148/2026', `dtgltpnt` = '2026-07-23', `dtglkpnt` = '2031-07-23', `dtglsertifikat` = '2023-12-14', `dtglkadaluarsa` = '2028-12-14' WHERE `cnip` = '199206222020121004'; -- MOSES SIRAIT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02629/088/649/2019' WHERE `cnip` = '197605172002121001'; -- MUHAMMAD AWANG ELI BASYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08467/185/945/2018' WHERE `cnip` = '197109111992031003'; -- MUHAMMAD KORIBAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08468/185/646/2018', `cnopnt` = 'PNT-01775/030/640/2023', `cnosnt` = NULL WHERE `cnip` = '197903072006041001'; -- MUHAMMAD SAFII
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08451/185/248/2018' WHERE `cnip` = '197105271993032001'; -- MULIANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00335/088/81/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197007131991032001'; -- MURNIATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10419/087/855/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197801112006042001'; -- NENENG HERYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06499/191/458/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '197102041993032002'; -- NINOEK WIDIASTOETI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01588/185/152/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198311072015042001'; -- NOVIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01576/185/359/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198002122015042001'; -- NUCEU SITI AZIDJAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08253/185/658/2020', `dtgltbnt` = '2025-09-30', `dtglkbnt` = '2030-09-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198810272010121003'; -- NUGROHO YUDI PRANOTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03904/185/656/2018' WHERE `cnip` = '198512192015041002'; -- NUR AFRIJAL SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11083/185/153/2019' WHERE `cnip` = '196709181988031001'; -- NURUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00014736/121/3005/114/2022' WHERE `cnip` = '197909042005011002'; -- NURUL FAJRI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03264/087/265/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198212182008101001'; -- OPIK DESANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08322/018/145/2024', `cnosnt` = NULL WHERE `cnip` = '196707011990011001'; -- PAIMAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08530/028/176/2021', `dtgltsnt` = '2026-07-30', `dtglksnt` = '2031-07-30', `dtglsertifikat` = '2026-07-30', `dtglkadaluarsa` = '2031-07-30' WHERE `cnip` = '198712032010122011'; -- PIPIN MASTIKA PORQI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00132/022/176/2017' WHERE `cnip` = '197308212002122001'; -- POPPY HERAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04951/191/479/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198010232008122002'; -- PURNAWANTI AGNES TIMANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01536/185/195/2019' WHERE `cnip` = '198307122010121004'; -- RACHMAT HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-BNT-03760/191/096/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197604032008011010'; -- RANOE APRIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08423/185/497/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198611262010122004'; -- RESTI UTAMININGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01217/191/891/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198511032010122006'; -- RETNO NURHAYATI PRATIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01637/030/397/2023', `cnosnt` = NULL WHERE `cnip` = '198106082006041003'; -- R. HARYO JAGAD PANUNTUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04777/087/695/2026', `dtgltbnt` = '2026-07-14', `dtglkbnt` = '2031-07-14', `dtglsertifikat` = '2026-07-14', `dtglkadaluarsa` = '2031-07-14' WHERE `cnip` = '198701192010121007'; -- RICKY PRIMANDA IKRAR ABADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08424/185/298/2018' WHERE `cnip` = '197605042002122001'; -- RIFA JAMILAH KHOIRIDHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01275/088/295/2020', `cnosnt` = 'SNT-12531/179/292/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197609282002122001'; -- RINA ARIESTA WAHYU HAPSARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05796/087/247/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197810062006042001'; -- RITA DEWI SUSPALUPI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06965/185/196/2020' WHERE `cnip` = '196804032002122001'; -- RITA ROSTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09660/009/891/2018' WHERE `cnip` = '198909202015041003'; -- RIZA FATONI HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03737/022/590/2026', `cnosnt` = NULL WHERE `cnip` = '198006102006041002'; -- ROHIMAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07339/185/692/2020', `dtgltbnt` = '2025-09-30', `dtglkbnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198011152009102001'; -- RR FRISCA RATIH K
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01609/020/196/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197504052002122002'; -- RR.IDA KUSWARDATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02308/087/693/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = 'SNT-09881/087/696/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197602042005012019'; -- RUSI FIBRIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-0777/2.3.1.2.8/03/03/2006', `cnopnt` = NULL, `cnosnt` = 'SNT-03263/087/704/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197412302002122001'; -- SARI WULAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04953/191/401/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198407232008122003'; -- SHELYA EKA PRATIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00826/185/806/2021', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197903182005012002'; -- SOFIA ANA NOVIERTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02294/191/007/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197604212005012002'; -- SRI KARTINI RUSILAWATI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-12815/087/207/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '196906101994032005'; -- SRI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11654/022/807/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196801301991031003'; -- SUGITO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03602/087/001/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198303242006041004'; -- SUHENDRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09900/191/608/2024', `cnopnt` = 'PNT-03972/087/601/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198603182018011001'; -- SULTAN TAKDIR ALI SAHBANA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00464/414/804/2021' WHERE `cnip` = '197006222002121001'; -- SUMADIANTO AFFANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01936/088/809/2017' WHERE `cnip` = '196305311985031003'; -- SURADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01428/088/305/2017' WHERE `cnip` = '196803061992032002'; -- SUSI FINARTI MARIA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08534/028/700/2021', `dtgltsnt` = '2021-09-16', `dtglksnt` = '2026-09-16', `dtglsertifikat` = '2021-09-16', `dtglkadaluarsa` = '2026-09-16' WHERE `cnip` = '198706062010122005'; -- SWETY RETNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02976/022/424/2025' WHERE `cnip` = '197109252002121002'; -- TAUFIK HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08458/185/725/2018' WHERE `cnip` = '198712182014042001'; -- TIKA ANDRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02943/028/528/2020', `dtgltbnt` = '2025-01-23', `dtglkbnt` = '2030-01-23', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-01-23', `dtglkadaluarsa` = '2030-01-23' WHERE `cnip` = '197502012005012001'; -- TRIANITA MAHAYUNINGTYAS KUSUMA ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06556/191/022/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `dtglsertifikat` = '2023-10-02', `dtglkadaluarsa` = '2028-10-02' WHERE `cnip` = '198502232010122005'; -- TRI SETIYANI DARMASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05108/087/634/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197602102006041001'; -- UJA ISKANDAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00455/032/444/2021' WHERE `cnip` = '196508141998031002'; -- UMAR
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09886/087/741/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198305012018012001'; -- VIVIN MONICA YOSIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02695/087/352/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197803142014091002'; -- WAHYU SULISTYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03774/191/951/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197811112006041001'; -- WAQID SURYA SUPARTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01887/191/254/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `dtglsertifikat` = '2025-04-10', `dtglkadaluarsa` = '2030-04-10' WHERE `cnip` = '197506042005011001'; -- WARAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06134/185/054/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198010292009101001'; -- WELY PRANOTO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-01975/087/052/2021', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198001102006041002'; -- WIBISONO PRABOWO DWI SAPUTRO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08428/185/372/2018' WHERE `cnip` = '196802161992032009'; -- YOYO HAIRONI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01882/032/779/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `cnosnt` = NULL, `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198112142006041002'; -- YUDHISTIRA ADI NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06841/088/479/2018', `cnopnt` = 'PNT-02310/087/476/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = 'SNT-09880/087/475/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198507132010122008'; -- YULIA FITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00223/022/677/2017' WHERE `cnip` = '197908022006042002'; -- YULIA MUSTIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06569/191/276/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199307302020122004'; -- YULIANI ERYANINGTYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09067/022/772/2025', `cnosnt` = NULL WHERE `cnip` = '197207012006042001'; -- YULI RIANAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10346/172/574/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = '101090078000684', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198006012008022001'; -- YUNI HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01295/019/187/2023', `cnosnt` = NULL WHERE `cnip` = '198307122006041001'; -- ZUHE SAFITRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02779/185/615/2017' WHERE `cnip` = '197611102001121005'; -- ABDUL BASYIR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10561/054/413/2023' WHERE `cnip` = '197112122003121009'; -- ABDUL KADIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08438/191/713/2024' WHERE `cnip` = '196810201990031002'; -- ABDUL MADJID
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08718/087/814/2026', `dtgltsnt` = '2026-07-07', `dtglksnt` = '2031-07-07', `dtglsertifikat` = '2026-07-07', `dtglkadaluarsa` = '2031-07-07' WHERE `cnip` = '197808052003121001'; -- ABDUL MAJID
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01941/191/915/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `cnopnt` = NULL, `cnosnt` = 'SNT-07273/063/919/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197803102009091001'; -- ABDUL RAJAB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02851/059/116/2023', `cnosnt` = NULL WHERE `cnip` = '198502242009041004'; -- ABRAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06821/415/317/2022' WHERE `cnip` = '197502182003121001'; -- ACEP EKA KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10351/022/410/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198703242010121004'; -- ACHMAD RIDWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00842/185/714/2021', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197805072007101002'; -- ADE AMIR HAMZAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00395/191/617/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197607062007011002'; -- ADEN KODING
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00034361/121/3005/114/2023' WHERE `cnip` = '197405172008101001'; -- ADE NURJAYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-', `cnopnt` = NULL, `cnosnt` = 'SNT-03265/017/416/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198703062018011001'; -- ADE RIDWAN MAULANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00993/016/311/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198709272006041004'; -- ADE SEPTIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08911/185/019/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198804192019021005'; -- ADI RAHMATULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00052/030/617/2020', `dtgltbnt` = '2025-01-23', `dtglkbnt` = '2030-01-23', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-01-23', `dtglkadaluarsa` = '2030-01-23' WHERE `cnip` = '198505082005011001'; -- ADITYA AGUNG INDRAYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05183/191/117/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2023-10-02', `dtglkadaluarsa` = '2028-10-02' WHERE `cnip` = '197407212003121001'; -- ADRI MARGONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03859/185/815/2018' WHERE `cnip` = '197602122005011002'; -- AFDELDI PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09086/185/213/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199011102019022006'; -- AFIAH NURAENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06999/185/613/2018' WHERE `cnip` = '198204202012122001'; -- AFLIDARNETI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01314/031/619/2017' WHERE `cnip` = '197309301994031001'; -- AGUNG GUNAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00199/026/799/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197711292005011001'; -- AGUNG PRASETYO CAHYO WICAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02144/440/411/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198311292018011001'; -- AGUNG PRIYANTO HINDRIA SMITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07276/191/212/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = 'PNT-01089/065/218/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '199509272019021001'; -- AGUNG SEPTYANTO PUTRA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04771/054/719/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197009102001121002'; -- AGUNG SETIYO BUNTORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03095/185/417/2017' WHERE `cnip` = '199106082015041001'; -- AGUNG YULIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03457/185/919/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198108022009101001'; -- AGUS KRISTIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08964/185/817/2020' WHERE `cnip` = '198908212019021002'; -- AGUS KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '00701/004/618/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197911262003121001'; -- AGUS MUHARDI AMIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06633/087/318/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199004282014041002'; -- AGUS SOPIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01485/191/318/2023', `dtgltbnt` = '2023-04-03', `dtglkbnt` = '2028-04-03', `cnopnt` = NULL, `cnosnt` = 'SNT-05288/050/313/2023', `dtgltsnt` = '2023-06-26', `dtglksnt` = '2028-06-26', `dtglsertifikat` = '2023-04-03', `dtglkadaluarsa` = '2028-04-03' WHERE `cnip` = '198506042008011004'; -- AGUSTAWAN ISA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01504/185/910/2019' WHERE `cnip` = '197605102006042002'; -- AHLUN MARIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '02-09716-0325', `cnosnt` = NULL WHERE `cnip` = '197009302002121001'; -- AHMAD DAHLAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197202182002121002'; -- AHMAD MUDLOFIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03096/185/518/2017' WHERE `cnip` = '197909282005011012'; -- AHMAD RUSLAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02226/014/212/2025' WHERE `cnip` = '198011112002121002'; -- AHMAD SYAHRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04677/191/614/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `cnosnt` = 'SNT-10559/440/610/2026', `dtgltsnt` = '2026-08-04', `dtglksnt` = '2031-08-04', `dtglsertifikat` = '2026-08-04', `dtglkadaluarsa` = '2031-08-04' WHERE `cnip` = '198002242005011001'; -- AHMAD ZAKARIA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03148/045/416/2021', `dtgltpnt` = '2026-04-30', `dtglkpnt` = '2031-04-30', `dtglsertifikat` = '2026-04-30', `dtglkadaluarsa` = '2031-04-30' WHERE `cnip` = '198002042002121001'; -- AKHMAD GAFURI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01164/038/012/2016' WHERE `cnip` = '198108212010121002'; -- AKHMAD SATRYA ARPAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08927/185/816/2020' WHERE `cnip` = '199002072019022005'; -- ALFIANA RINAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07739/416/816/2022', `cnosnt` = NULL WHERE `cnip` = '196603122009011001'; -- ALFIANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01132/088/317/2017' WHERE `cnip` = '198111112009101001'; -- ALFIYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02780/185/417/2017' WHERE `cnip` = '197512092005012002'; -- AMALIA ARIEF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10276/185/516/2020' WHERE `cnip` = '197511102007011002'; -- AMAS MUDA SIREGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03169/185/819/2017' WHERE `cnip` = '198102072009122003'; -- AMI DWI WULANSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03860/185/117/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196512251992032014'; -- AMRATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02737/405/419/2025' WHERE `cnip` = '198508212009031001'; -- AMSI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08400/185/912/2020' WHERE `cnip` = '198512302008101001'; -- ANDI DAMAYANTO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-14694/019/814/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198602022018011001'; -- ANDIK TISTYAWANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04467/191/311/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198403262008101001'; -- ANDI MARWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06686/185/916/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197504212005011001'; -- ANDI MUISDINILAH SYAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08416/185/919/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196507102007012020'; -- ANDI PATY SABANDARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-1109/185/810/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198704272011011005'; -- ANDI PRIYANTOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-063559/185/113/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198609082010122006'; -- ANDI RAMLAH HASANUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '10560/054/312/2023', `cnosnt` = NULL WHERE `cnip` = '197111032003121001'; -- ANDI SAIFUDDAULAH SYAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-14692/433/612/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198108272015041001'; -- ANDRI SYAWALUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-11749/179/012/2025', `dtgltsnt` = '2025-11-10', `dtglksnt` = '2030-11-10', `dtglsertifikat` = '2025-11-10', `dtglkadaluarsa` = '2030-11-10' WHERE `cnip` = '197910032003121003'; -- ANDY AKHMAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09085/185/212/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199006072019022006'; -- ANGGIA RUHIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03170/185/511/2017' WHERE `cnip` = '198808102015041003'; -- ANGGI HERU M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06604/191/116/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198211272009102001'; -- ANI RUMANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01239/191/815/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197508172008012018'; -- ANISAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11285/185/217/2018' WHERE `cnip` = '198101112003122001'; -- ANITA NUR ROHMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02668/440/712/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198010262001122001'; -- ANITA ROSANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03836/185/110/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198212172010012016'; -- ANITA SAFRIDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02781/185/818/2017' WHERE `cnip` = '197710212001122001'; -- ANITA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02672/185/217/2017' WHERE `cnip` = '196405071986022001'; -- ANJARWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07200/185/919/2020' WHERE `cnip` = '198602212010122005'; -- ANNISA MURTI SISILIA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-02016/042/219/2025' WHERE `cnip` = '199602232019022005'; -- ANNISA RIDHA HAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02361/191/212/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198901312019022009'; -- ANNIS NUR JANNAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03459/185/011/2018', `cnosnt` = NULL WHERE `cnip` = '196412251987032013'; -- ANSE SATUMALAY
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04770/054/218/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197603152002121002'; -- ANSHARY SAJUTHI GUMAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03133/185/410/2017' WHERE `cnip` = '199103292015042001'; -- A. NURHAYATI LATIEF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08517/185/811/2020', `cnopnt` = 'PNT-10349/172/817/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198005232005012001'; -- ANY SAYEKTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03863/185/510/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-05228/020/517/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197904052003122006'; -- APRIANA ANGGRAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08735/191/213/2023', `dtgltbnt` = '2023-12-14', `dtglkbnt` = '2028-12-14', `cnopnt` = NULL, `cnosnt` = 'SNT-11134/004/210/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197304172005012001'; -- APRILDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11286/185/218/2018' WHERE `cnip` = '197904022003122001'; -- APRILIA LISTIYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00826/191/616/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '199404182019022009'; -- APRILIA SURYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01641/191/012/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-04-10', `dtglkadaluarsa` = '2030-04-10' WHERE `cnip` = '198306212009122002'; -- A.RAPIATNI A.HASAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05504/185/214/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '198008152003121002'; -- ARBAIN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-02289/051211/2024' WHERE `cnip` = '197810242002121001'; -- ARDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02754/185/218/2017' WHERE `cnip` = '197709272010121001'; -- ARDI WASITA KUSUMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-19380/191/211/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198210012009101001'; -- ARIADITA WIDIAMBODO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09325/182/919/2024', `cnosnt` = NULL WHERE `cnip` = '197511232002122001'; -- ARIANI ARSAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08479/185/918/2018' WHERE `cnip` = '197503222005012004'; -- ARIE SANTI SIREGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03927/185/711/2018' WHERE `cnip` = '198311132010122004'; -- ARIKA NOVRANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03880/1851/419/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198612162010122004'; -- ARIS CIPTANINGTYAS KUSUMASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05301/010/619/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197006301998031006'; -- ARMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04274/191/627/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198106292014041001'; -- Arman Satya Prayoga, S.Pd., M.A.P.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06958/191/118/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197605032010011017'; -- ARWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05456/191/910/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197706092008012015'; -- ASDYANA SYAM
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197705082003121002'; -- ASEP SUBAGJA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02635/191/916/2024', `dtgltbnt` = '2024-07-01', `dtglkbnt` = '2029-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-07-01', `dtglkadaluarsa` = '2029-07-01' WHERE `cnip` = '198412312009101002'; -- ASHAR KONGGI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02494/414/319/2024', `cnosnt` = '01058/031/314/2021' WHERE `cnip` = '197908182001122001'; -- ASIH WAHYU WARDHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03144/191/212/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `cnosnt` = 'SNT-01544/063/214/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '199212082019022012'; -- ASMA DESI RATNA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01405/185/610/2021', `dtgltbnt` = '2026-06-28', `dtglkbnt` = '2031-06-28', `cnopnt` = NULL, `cnosnt` = 'SNT-02697/054/614/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-06-28', `dtglkadaluarsa` = '2031-06-28' WHERE `cnip` = '198108182005012002'; -- ASMI ARIFIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-13335/046/215/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197608102000122003'; -- ASNIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03421/185/010/2018' WHERE `cnip` = '197709072001122001'; -- ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06217/191/116/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198209202010012019'; -- ASTUTI SOFYANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02625/087/015/2022', `cnosnt` = NULL WHERE `cnip` = '197512052005011002'; -- ASWIN WIHDIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04084/191/416/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199701162019022007'; -- AULIA ANITA RAHMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05787/191/717/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198907302015042004'; -- AULIA RAHMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01341/088/819/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196612211988032001'; -- AYUDYA PARAMA DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01583/185/517/2019' WHERE `cnip` = '199002222015042007'; -- AYUSNITA WIDI NILASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02805/185/115/2017' WHERE `cnip` = '198812112014042002'; -- AYU SUKMAWATI ADI PUTRI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-10560/191/112/2026', `dtgltsnt` = '2026-08-04', `dtglksnt` = '2031-08-04', `dtglsertifikat` = '2026-08-04', `dtglkadaluarsa` = '2031-08-04' WHERE `cnip` = '197212272003121001'; -- AZHARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03929/185/523/2018' WHERE `cnip` = '196808122007011001'; -- BADARUSALAM ASYARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10267/185/426/2020', `cnosnt` = 'SNT-08960/032/423/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '199503252019021005'; -- BAGUS HADI KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-05367/038/921/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197512312008121008'; -- BAHARUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-11153/403/821/2022' WHERE `cnip` = '197106222003121001'; -- BAHARUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06614/191/127/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '197009051990101001'; -- BAHRUN PRAYITNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06010/185/027/2020' WHERE `cnip` = '198012182014082001'; -- BALAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04302/191/029/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197908242009101001'; -- BAMBANG LUKMAN MALIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05289/004/124/2023', `cnosnt` = NULL WHERE `cnip` = '197007162003121002'; -- BASTIAN DERAJAT PULUNGAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02535/008/925/2024', `cnosnt` = NULL WHERE `cnip` = '198307292003121002'; -- BENNY HENDRIZAL EKA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03462/185/725/2018' WHERE `cnip` = '196308281987021001'; -- BERAHAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04325/049/424/2022' WHERE `cnip` = '197707032002121003'; -- BERNAD JENCER SANGIAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-12532/179/723/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197306012006041001'; -- BILAL AL HANIFI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00240/022/36/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198102202005011003'; -- BISMA ADITYA HARTIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03145/191/623/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `cnopnt` = 'PNT-10371/063/622/2024', `cnosnt` = 'PNT-1037/063/622/2024', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '198709202014041001'; -- BONDAN MARTALALU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-18043/409/326/2025' WHERE `cnip` = '197906102003121002'; -- BONNY HANAFI DA COSTA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01619/087/627/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197605172009101001'; -- BUDI WIHARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05122/185/720/2020', `cnopnt` = NULL WHERE `cnip` = '197510132005011002'; -- BUDY SUPRAPTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197604282006041001'; -- CANDRA SAMPETODING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03101/185/135/2017' WHERE `cnip` = '197608282006042001'; -- CATUR AGUSTIN RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00005121/121/3005/114/2025', `cnosnt` = NULL WHERE `cnip` = '197901312005011002'; -- CEPY LUKMAN RUSDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08809/185/535/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198707212015042005'; -- CHRISTA ELISABETH PAULIN SAWAKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01553/088/034/2017' WHERE `cnip` = '197502242007012001'; -- CLEOVATRA VERA  EKA  HESTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '01059/031/345/2021' WHERE `cnip` = '198108242005012002'; -- DAHLIA  KUSUMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07161/185/645/2020', `dtgltbnt` = '2025-09-30', `dtglkbnt` = '2030-09-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198806132010122007'; -- DAHLIA PURNAMASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08105/185/844/2018' WHERE `cnip` = '197105052008012011'; -- DALIYAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05349/030/641/2023', `dtgltpnt` = '2023-06-26', `dtglkpnt` = '2028-06-26', `dtglsertifikat` = '2023-06-26', `dtglkadaluarsa` = '2028-06-26' WHERE `cnip` = '197807312005011001'; -- DANANG KUMORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06378/185/844/2020' WHERE `cnip` = '197610222003121002'; -- DANY FAJAR NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08810/185/347/2020', `cnosnt` = NULL WHERE `cnip` = '197412091999031004'; -- DARMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08967/185/140/2020', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '199212072019022004'; -- DEBRINA CHRISTARANY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-12242/038/941/2021', `dtgltpnt` = '2021-12-31', `dtglkpnt` = '2026-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2021-12-31', `dtglkadaluarsa` = '2026-12-31' WHERE `cnip` = '197711032003121001'; -- DEDY WAHYUDDIN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04324/426/743/2022' WHERE `cnip` = '197612012003122001'; -- DEISY SAMPUL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08928/185/647/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198205102010011020'; -- DENNY TARORES
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03174/185/345/2017' WHERE `cnip` = '197912042009102001'; -- DESSY ANGGARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08276/185/843/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197008121990032001'; -- DESWARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08906/408/743/2024' WHERE `cnip` = '198012152003122001'; -- DESYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03569/191/543/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '199508302019022004'; -- DETI ELMAHERA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00004/191/744/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197511302003122002'; -- DEVI ARIANTJI LOLYTA NDOEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08951/185/943/2020', `cnopnt` = NULL, `cnosnt` = 'SNT-03210/147/946/2024' WHERE `cnip` = '198508082018032001'; -- DEWI AGUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08463/185/641/2018', `dtgltbnt` = '2023-05-31', `dtglkbnt` = '2028-05-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2023-05-31', `dtglkadaluarsa` = '2028-05-31' WHERE `cnip` = '198405092008122002'; -- DEWI AMALIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01354/045/943/2019', `cnopnt` = '061326111925049', `cnosnt` = 'SNT-11757/045/941/2021', `dtgltsnt` = '2026-07-30', `dtglksnt` = '2031-07-30', `dtglsertifikat` = '2026-07-30', `dtglkadaluarsa` = '2031-07-30' WHERE `cnip` = '198604102008122004'; -- DEWI SYAHRINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09310/191/643/2023', `cnopnt` = NULL, `cnosnt` = '00027619/121/3005/114/2021' WHERE `cnip` = '197511112003122001'; -- DIAH WIDURI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02735/185/247/2017', `cnopnt` = '00005691/121/3005/114/2025', `cnosnt` = NULL WHERE `cnip` = '197001132007012001'; -- DIANA HERAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03140/185/948/2017' WHERE `cnip` = '199203232015042001'; -- DIANA PUJI UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01011/191/543/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198404272014092001'; -- DIAN MULYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03424/185/943/2018' WHERE `cnip` = '197801032010122001'; -- DIAN NOVITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0622/2.2.0.0.1/03/03/2011', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197706242005012002'; -- DIAN PRASETYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08464/185/042/2018' WHERE `cnip` = '198109112005012004'; -- DIAN SEPTIANY SUBAGIO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02686/191/242/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198501262005012002'; -- DIAN TUGAS MAYASARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01556/158/847/2024' WHERE `cnip` = '197604292003121002'; -- DICKY APRIADY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03104/185/148/2017' WHERE `cnip` = '198808072014042002'; -- DINI AGUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04103/185/648/2018' WHERE `cnip` = '199003132015042003'; -- DINNY FITRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08428/015/242/2026' WHERE `cnip` = '197409022003121003'; -- DIRBOWO ADHI PRAGNYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08932/185/942/2020', `cnopnt` = 'BNT-08932/185/942/2020', `cnosnt` = NULL WHERE `cnip` = '198205042005012011'; -- DISTI MARLINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02824/185/146/2017' WHERE `cnip` = '197304252002121001'; -- DITO WIDYANTO ANANDA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02070/087/049/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197511062009102002'; -- DIYAH PURWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07055/185/77/2018' WHERE `cnip` = '197011172014091002'; -- DODDY RACHMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01580/185/244/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198401182008011003'; -- DODY AGUNG PRIAMBODO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04104/185/249/2018' WHERE `cnip` = '196410101988101001'; -- DODY ARIA TRISNAMUTIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07425/050/748/2022', `cnosnt` = NULL WHERE `cnip` = '198001172009121002'; -- DONI PUNU
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03160/004/440/2024' WHERE `cnip` = '197808292003121001'; -- DONNY LEONARD AGUSTINUS ARITONANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02736/185/148/2017', `cnopnt` = 'PNT-11297/010/140/2023', `cnosnt` = NULL WHERE `cnip` = '197612052003121002'; -- DONY MARTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00683/004/247/2016' WHERE `cnip` = '197807281998012001'; -- DWI ASNITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06952/185/042/2020' WHERE `cnip` = '197612222005011001'; -- DWIJO SAPUTRO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06761/185/640/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198806222010122004'; -- DWI KUSUMANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03106/185/540/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197112131998022001'; -- DWI KUSWINARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00309/161/342/2016' WHERE `cnip` = '197103022003121002'; -- DWI MARTOYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-13206/051/442/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198803052008012001'; -- DWI WINARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01355/022/244/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197403082003122003'; -- DWIYANI MARSETYANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00370/191/740/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198902172019022007'; -- DWI ZURYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06305/016/854/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-13071/016/852/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197606272002121003'; -- EDWARD KENNEDY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01090/045/550/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197905312009121001'; -- EDY MASRIDHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12478/049/552/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196703272014081001'; -- EFRAIM LAO SAHANTE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07484/191/953/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '198206302014091001'; -- EKO PRASETIYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04369/012/252/2022', `dtgltpnt` = '2022-04-04', `dtglkpnt` = '2027-04-04', `cnosnt` = NULL, `dtglsertifikat` = '2022-04-04', `dtglkadaluarsa` = '2027-04-04' WHERE `cnip` = '197909162002121006'; -- EKO PRASETYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01528/185/356/2019', `cnopnt` = 'BNT-01528/185/356/2019' WHERE `cnip` = '198312272015041001'; -- EKO SETIA AJI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08108/185/657/2018' WHERE `cnip` = '197602012005012002'; -- EKO SRI NURCAHYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04407/191/655/2022', `cnopnt` = 'PNT-00730/015/650/2024', `dtgltpnt` = '2024-01-16', `dtglkpnt` = '2029-01-16', `cnosnt` = 'SNT-00729/015/658/2024', `dtglsertifikat` = '2024-01-16', `dtglkadaluarsa` = '2029-01-16' WHERE `cnip` = '198707222010121008'; -- EKO SUNARSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00777/015/151/2024', `dtgltpnt` = '2024-01-17', `dtglkpnt` = '2029-01-17', `cnosnt` = 'SNT-00776/015/150/2024', `dtglsertifikat` = '2024-01-17', `dtglkadaluarsa` = '2029-01-17' WHERE `cnip` = '198607192009121002'; -- ELDY PRIMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00622/191/350/2024', `cnopnt` = NULL, `cnosnt` = 'SNT-00032/010/355/2024' WHERE `cnip` = '198502082010122004'; -- ELFIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08109/185/958/2018' WHERE `cnip` = '196907071993032005'; -- ELFIENTERIA MARALYN SINLAELOE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08482/185/752/2018' WHERE `cnip` = '197612102008102001'; -- ELIANA WIDYASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03463/185/056/2018' WHERE `cnip` = '196603141990032006'; -- ELI MASNUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02807/185/157/2017' WHERE `cnip` = '197409012005012001'; -- ELLA KOMALA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03932/185/257/2018' WHERE `cnip` = '198405052015041002'; -- ELLYCO ALVIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01579/185/952/2019' WHERE `cnip` = '197002281994032002'; -- EMILIA SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05109/017/855/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197508172005012001'; -- EMILIA ZULAIHA ZAHARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05203/185/750/2020' WHERE `cnip` = '198611012010122005'; -- EMMY SAPRIA TUHAREA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07057/185/759/2018', `cnopnt` = 'PNT-02322/042/759/2024', `cnosnt` = NULL WHERE `cnip` = '197202242014072002'; -- ENDANG SUKOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02802/063/552/2020' WHERE `cnip` = '197707222009092001'; -- ENDANG YULIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03142/185/750/2017' WHERE `cnip` = '197808132009102001'; -- ERNI AGUSTINA WAHYU RAHMAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02088/191/358/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199203272019021004'; -- ERWIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04910/061/554/2022', `cnosnt` = NULL WHERE `cnip` = '198210132002121005'; -- ERWIN MURAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02826/185/958/2017' WHERE `cnip` = '198109102003121006'; -- ERWINSYAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00498/062/351/2023', `cnosnt` = 'SNT-02336/062/354/2021' WHERE `cnip` = '197406062003121002'; -- ERWIN UMASUGI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07480/191/459/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '196802172005012001'; -- ETIK PUSPARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04047/191/155/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903022010122003'; -- ETY KUSLINDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01548/088/658/2017' WHERE `cnip` = '197303302007012002'; -- EVI MAHARANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00775/001/369/2024' WHERE `cnip` = '197410102002121007'; -- FADLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02682/185/068/2017', `dtgltbnt` = '2022-12-16', `dtglkbnt` = '2027-12-16', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2022-12-16', `dtglkadaluarsa` = '2027-12-16' WHERE `cnip` = '197601242005012001'; -- FAJRI ELFIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05901/185/165/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '197812302014042001'; -- FALI HENUTESA DANO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01310/191/365/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198611252019022006'; -- FARIDA HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05704/191/766/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197301242005012001'; -- FARITAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06355/016/369/2018', `cnopnt` = 'PNT-19985/016/362/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = 'SNT-08440/016/366/2021', `dtgltsnt` = '2026-07-30', `dtglksnt` = '2031-07-30', `dtglsertifikat` = '2026-07-30', `dtglkadaluarsa` = '2031-07-30' WHERE `cnip` = '198102112008011008'; -- FATHONI HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-04021/004/467/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198707112010122005'; -- FATIMAH ZAHRO HARAHAP
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07190/185/567/2020', `cnosnt` = NULL WHERE `cnip` = '198702082010122002'; -- FEBRIANI TRIWIYATNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07962/191/164/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '199202082019021003'; -- FEBRIAN TRIYUDHANTO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '196405241988121004'; -- FELIPUS MERUKH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08111/185/761/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197709222003122009'; -- FEMMY ARSYAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02612/191/661/2023', `dtgltbnt` = '2023-07-03', `dtglkbnt` = '2028-07-03', `cnopnt` = NULL, `cnosnt` = 'SNT-14693/059/663/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2023-07-03', `dtglkadaluarsa` = '2028-07-03' WHERE `cnip` = '198605162019021002'; -- FERDIANSYAH DJAFAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08968/185/161/2020' WHERE `cnip` = '197406042008011013'; -- FERHAT ABBAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02783/185/760/2017' WHERE `cnip` = '198502202008121002'; -- FERI WIDYANTOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08418/185/561/2018' WHERE `cnip` = '197203121996032004'; -- FERRA ELEN JACOB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03109/185/063/2017' WHERE `cnip` = '199204052014042001'; -- FITRI APRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02423/191/561/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197709112003122002'; -- FITRI DANAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00892/087/169/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197704152009102002'; -- FITRIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03464/185/367/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197809272010012009'; -- FITRI YENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00654/185/165/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197901042008101001'; -- FREDY LASMANTYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03915/185/368/2018' WHERE `cnip` = '197812052005011003'; -- FX.KURNIANTO NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06132/046/742/2021' WHERE `cnip` = '196611302000121001'; -- GATOT SARI IRIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03972/185/771/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197804082005011008'; -- GEORGE CHANDRA LELA DETHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10280/185/871/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198802192019021004'; -- GITO AGRA NAROTAMA PANJAITAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03611/185/771/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196807152002121001'; -- GIWAN RIATO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01185/191/175/2026', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199208202019022008'; -- GUSTIA BURNAWITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06385/022/072/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198802202014041001'; -- GUSTRIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05619/191/881/2022' WHERE `cnip` = '198005232008101001'; -- HADI SUSILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02563/407/586/2021', `cnosnt` = 'SNT-19803/016/581/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197610102001121003'; -- HAMLAN SIREGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT07738/416/185/2022', `cnosnt` = '00026403/121/3005/114/2021' WHERE `cnip` = '197111012005011002'; -- HANITYO MUKTIARSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07860/422/941/2025' WHERE `cnip` = '196612312001121003'; -- HARISMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03425/185/684/2018' WHERE `cnip` = '196410141992031002'; -- HARIYOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03843/185/088/2018' WHERE `cnip` = '197512052003122001'; -- HARTATI I LIHAWA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03466/185/989/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197809232007011004'; -- HARTONO, S.Pd
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05845/050/382/2022' WHERE `cnip` = '197704142007011011'; -- HARUN DOMILI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02683/185/089/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197907072008101001'; -- HARUN YUSUF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08364/043/181/2023', `cnosnt` = NULL WHERE `cnip` = '198001022005011002'; -- HASIHOLAN YUSUF LUMBANTORUAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02435/191/184/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197508012002122001'; -- HELLY DEISY TAMBENGI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05625/185/388/2020', `cnosnt` = 'SNT-10011/012/383/2023', `dtgltsnt` = '2023-11-22', `dtglksnt` = '2028-11-22', `dtglsertifikat` = '2023-11-22', `dtglkadaluarsa` = '2028-11-22' WHERE `cnip` = '197408042002121001'; -- HENDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00225/042/889/2018' WHERE `cnip` = '197210171994031001'; -- HENDRIK JOKOLESTONO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '197502132002121002'; -- HENDRI PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02762/185/387/2017', `cnopnt` = NULL, `cnosnt` = 'SNT-00029/010/381/2024' WHERE `cnip` = '197910242009121004'; -- HENDRIWAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00035911/121/3005/114/2023' WHERE `cnip` = '197512292008121001'; -- HENDRO SUCIPTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04915/191/189/2022' WHERE `cnip` = '198203082009101002'; -- HERI KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02784/185/181/2017' WHERE `cnip` = '196610262005011001'; -- HERIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08814/185/081/2020' WHERE `cnip` = '198801302019021003'; -- HERLAMBANG PAMUNGKAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-06087/182/681/2025' WHERE `cnip` = '198305192014042001'; -- HERLINAH JOHAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00228/038/282/2018', `cnosnt` = 'SNT-10517/038/284/2021', `dtgltsnt` = '2026-06-30', `dtglksnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '197704132006042001'; -- HERLINA WIDIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00032475/121/3005/114/2021' WHERE `cnip` = '197709242001121003'; -- HERRY HERLAMBANG
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '197705202005011003'; -- HERRY MAIDHANY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01530/185/989/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197002282006042001'; -- HILDA HIAHMAD BACHMID
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04105/185/080/2018' WHERE `cnip` = '197711222010012010'; -- HILDHA SALAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03110/185/685/2017', `cnopnt` = NULL WHERE `cnip` = '198012052009041001'; -- HILMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01581/185/885/2019', `cnopnt` = NULL, `cnosnt` = 'SNT-09826/009/885/2023' WHERE `cnip` = '198802192015041001'; -- HILMAN AQUARITO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00371/191/081/2023', `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '198107222015041002'; -- HOS ARIE RHAMADHAN SIBARANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04225/191/783/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '197502212002122001'; -- HUSNIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02785/185/092/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196708181992031005'; -- IBNUH HAJAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04238/031/697/2019' WHERE `cnip` = '197912252003121001'; -- IBNU NAZIM BINTORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05604/427/295/2023', `cnosnt` = NULL WHERE `cnip` = '198107242008041002'; -- ICHSAN SULA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02810/185/691/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198507152009012008'; -- IDAMAWATI M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '02235/191/992/2023', `cnopnt` = 'PNT-00497/062/990/2023', `cnosnt` = NULL WHERE `cnip` = '198103162006041002'; -- IDHAM ISMAIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02684/185/990/2017' WHERE `cnip` = '197704012001122001'; -- I GUSTI AGUNG AYU PUTU SASRANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04094/185/997/2018' WHERE `cnip` = '198609242015041001'; -- IHSAN MAULANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02769/191/594/2024' WHERE `cnip` = '198411292008121002'; -- IHSAN SANI ABDULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09090/185/298/2020', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '198906092019022007'; -- IKA PURWANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03179/185/990/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198206032009102001'; -- IKE DEWI MAYADIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05134/037/593/2023', `cnosnt` = NULL WHERE `cnip` = '197708031998021001'; -- I KOMANG WIRATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05135/037/294/2023' WHERE `cnip` = '197705032001121003'; -- I MADE ABDI WISMANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10240/185/097/2020', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '199205222019021004'; -- I MADE BAYU PRAWIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07020/087/599/2022', `cnosnt` = NULL WHERE `cnip` = '198305182005011003'; -- IMAM PRANATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09119/191/590/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199307062019021007'; -- IMAM SUSILO ADHI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00548/185/897/2022', `dtgltbnt` = '2022-04-20', `dtglkbnt` = '2027-04-20', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2022-04-20', `dtglkadaluarsa` = '2027-04-20' WHERE `cnip` = '198503202008101001'; -- IMAN HINDRAMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06645/191/791/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = 'PNT-04646/039/790/2024', `dtgltpnt` = '2024-06-28', `dtglkpnt` = '2029-06-28', `cnosnt` = NULL, `dtglsertifikat` = '2024-06-28', `dtglkadaluarsa` = '2029-06-28' WHERE `cnip` = '198712182020122008'; -- IMMACULATA HENI HERAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09081/185/498/2020' WHERE `cnip` = '199507122019022005'; -- IMTIYAZUL URFA RAMADHAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04792/087/592/2025', `cnosnt` = '00033281/121/3005/114/2023' WHERE `cnip` = '197603182008012009'; -- INA NUROHMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03427/185/396/2018' WHERE `cnip` = '198203192008012008'; -- INCE AMRIANI SULTANIAH AZIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06269/191/693/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198011242009102001'; -- INDAH EKA SARTIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01575/191/598/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197811262009122001'; -- INDAH NOVIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04932/185/498/2020' WHERE `cnip` = '198703152014042001'; -- INDAH TRI WIDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00101/191/992/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `dtglsertifikat` = '2025-04-10', `dtglkadaluarsa` = '2030-04-10' WHERE `cnip` = '197803292008101001'; -- INDRA WIJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01532/185/691/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197804072001122001'; -- INDRAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00105/026/196/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '199001292010122003'; -- INGGIT AGIL ASMARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03112/185/097/2017', `cnopnt` = 'PNT-04294/004/099/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198605012005012001'; -- INTAN PASARIBU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04093/185/396/2018' WHERE `cnip` = '197701082008101001'; -- I PUTU ARI PARIYATNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06647/191/293/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198703312014041001'; -- IQBAL IMAM FAUZI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03871/185/899/2021', `dtgltbnt` = '2026-06-30', `dtglkbnt` = '2031-06-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198404112008122002'; -- IRAWATI MALINDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02536/008/596/2024' WHERE `cnip` = '196909012001121002'; -- IRFAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05822/185/797/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnosnt` = NULL, `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '197905152014081003'; -- IRHAM
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08732/051/590/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197610292001121001'; -- IRMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02982/191/491/2022' WHERE `cnip` = '199605042020122025'; -- IRMA SURIANI. R
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08815/185/392/2020' WHERE `cnip` = '198509012009122001'; -- IRMAYANI AMIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02152/191/790/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnosnt` = 'SNT-06018/087/795/2023', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197304122001122002'; -- IRNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02766/191/691/2024', `dtgltbnt` = '2024-07-01', `dtglkbnt` = '2029-07-01', `cnopnt` = 'PNT-12816/182/698/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = 'SNT-10557/182/698/2026', `dtgltsnt` = '2026-08-04', `dtglksnt` = '2031-08-04', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198706232010121007'; -- IRSAN FAIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-18718/440/995/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '199505192020121006'; -- IRZA AZWARDI SA'BANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01582/185/896/2019' WHERE `cnip` = '198902182014041001'; -- ISMA AMARULLAH G
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04548/191/991/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199503022020122015'; -- ISNA CHOIRINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11419/191/596/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199505062020122023'; -- ISTI ENDANG HUMAIRAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02787/185/894/2017' WHERE `cnip` = '198107112005012001'; -- ISWARI AMRUN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06632/063/697/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198803072019022007'; -- ITA SARI RAFI`UN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07005/185/892/2018' WHERE `cnip` = '198402132009101002'; -- IWAN SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03757/037/992/2024', `cnosnt` = NULL WHERE `cnip` = '197711032003121002'; -- I WAYAN TEJA BUDIANTARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01559/088/090/2017' WHERE `cnip` = '198011282002121001'; -- IWHAN AMBAR SAPUTRO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '03428/185/907/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197201092003121002'; -- JAFNI HENDRI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-10558/054/419/2026', `dtgltsnt` = '2026-08-04', `dtglksnt` = '2031-08-04', `dtglsertifikat` = '2026-08-04', `dtglkadaluarsa` = '2031-08-04' WHERE `cnip` = '197712072003121002'; -- JAMAL HAIRUDDIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07335/440/918/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198307102011011015'; -- JASMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04093/191/116/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197711232003121002'; -- JASRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05633/191/047/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196707282000031003'; -- JEJEN ZAINAL ARIFIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03429/185/608/2018' WHERE `cnip` = '196507171990022001'; -- JETJE M PANGEMANAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08242/008/606/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196807051997011001'; -- JHON NERI HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '197406282003121001'; -- JOHAN CORNEL PARDAMEAN SIMANJUNTAK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03872/185/400/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197009082007011018'; -- JOHN S PATTIRUHU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05127/030/715/2025', `cnosnt` = NULL WHERE `cnip` = '197404022005011002'; -- JOKO SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01340/088/708/2020' WHERE `cnip` = '197312132007011001'; -- JOKO SUSILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01308/088/402/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197212112008101001'; -- JUDO PRISWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02459/191/610/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197301052003121002'; -- JUHANA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02698/031/215/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198109042006041001'; -- JUJUK HARI SUBAGYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07006/185/603/2018' WHERE `cnip` = '198112312009101003'; -- JUJU SURGANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01467/004/518/2024', `dtgltpnt` = '2024-02-15', `dtglkpnt` = '2029-02-15', `cnosnt` = NULL, `dtglsertifikat` = '2024-02-15', `dtglkadaluarsa` = '2029-02-15' WHERE `cnip` = '197407252008011015'; -- JULIAN HENRI SEMBIRING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01006/016/107/2020' WHERE `cnip` = '198207312006042002'; -- JULIASTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08466/185/804/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197506192003121002'; -- JUNAEDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01754/191/517/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `dtglsertifikat` = '2025-04-10', `dtglkadaluarsa` = '2030-04-10' WHERE `cnip` = '197906032003121001'; -- JUNAIDI AHMAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10242/185/209/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199506112019022010'; -- JUNI FIRA REZA TJOA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03470/185/114/2018' WHERE `cnip` = '196510091990031009'; -- KARJU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00032395/121/3005/114/2021' WHERE `cnip` = '197805132008011004'; -- KASIDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03430/185/610/2018', `cnopnt` = 'PNT-02140/191/627/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197810192002121005'; -- KHAIRULHADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03150/185/919/2017' WHERE `cnip` = '198009192005012002'; -- KHOIRUL WAROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09361/185/519/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197308072002121001'; -- KHOLIS HUSYAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01365/088/115/2020', `cnosnt` = NULL WHERE `cnip` = '196808271998031004'; -- KODNI EF SANDIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04917/191/621/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197708042003121002'; -- KOKO HARMOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09993/037/810/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197705272001122001'; -- KOMANG DEWI ARNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00259/026/816/2017', `cnopnt` = NULL WHERE `cnip` = '198112152005011001'; -- KRISTIANA ANGGORO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04006/042/620/2021' WHERE `cnip` = '197211051994031004'; -- KURNIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02790/185/618/2017' WHERE `cnip` = '198102142003121001'; -- KUS KARNEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03471/185/615/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196505191998011001'; -- KUSYAIRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08262/185/618/2018' WHERE `cnip` = '197602292014082001'; -- KWARTINA ENDANG PAMUJI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03873/185/631/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197005042009012002'; -- LEINDRAWATI MEGAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03432/185/232/2018' WHERE `cnip` = '198801232015041001'; -- LEO RANGGA SELATAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08912/185/930/2020' WHERE `cnip` = '199407272018032001'; -- LIA ERLI WAHYUNINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10248/185/635/2020' WHERE `cnip` = '197110161997022002'; -- LIA YULIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08292/185/331/2020' WHERE `cnip` = '197108252008122001'; -- LILIK LAILI MALIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05149/063/539/2026', `dtgltbnt` = '2026-07-27', `dtglkbnt` = '2031-07-27', `dtglsertifikat` = '2026-07-27', `dtglkadaluarsa` = '2031-07-27' WHERE `cnip` = '197702272002122001'; -- LITA IKE DWIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00648/185/638/2022' WHERE `cnip` = '197311042002122002'; -- LOLY NOVIANTI SINTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01250/039/438/2020' WHERE `cnip` = '196702181992031001'; -- LOUIS JOSEPH BALLO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07546/191/232/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '197407042001121001'; -- LUKAS SUJARWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03151/185/930/2017' WHERE `cnip` = '196803022006042001'; -- LULU ROSMERY DAME SIHOMBING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03939/191/834/2024' WHERE `cnip` = '198005052015042002'; -- LUTFIATI KURNIA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '197707142001121002'; -- MABUD SOUMENA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10268/185/147/2020' WHERE `cnip` = '199207212015042001'; -- MAHARANI YUSTIANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02688/185/244/2017' WHERE `cnip` = '197904112008101002'; -- MAPPATARE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02109/043/842/2022', `cnosnt` = NULL WHERE `cnip` = '197903272010121001'; -- MARCOS SUTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05729/191/043/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = 'SNT-08255/009/040/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199103072015042002'; -- MARIZA NOER FAUZYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02002/050/944/2020' WHERE `cnip` = '196501162006042005'; -- MARJAM J B HUSAIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01198/065/149/2016' WHERE `cnip` = '197902032002121002'; -- MARKUS SAINYAKIT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10300/185/344/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199307042019022007'; -- MARLIANI KAPA`
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08902/191/449/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197912142009032003'; -- MARLIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08419/185/142/2018', `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '198009222014072001'; -- MARLINA DEWI. M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03917/185/440/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196906122008042001'; -- MARYANA YUNANI, S.Pd., M.M.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00351/031/049/2018', `cnopnt` = NULL WHERE `cnip` = '197006252002121001'; -- MARYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08819/185/046/2020', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '197403242010012003'; -- MASNAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01371/191/042/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197902022008122003'; -- MAULANI AUDIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03220/185/547/2021', `dtgltbnt` = '2021-10-01', `dtglkbnt` = '2026-10-01', `dtglsertifikat` = '2021-10-01', `dtglkadaluarsa` = '2026-10-01' WHERE `cnip` = '199405162019022009'; -- MAYORA PUTRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07007/185/844/2018', `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '197611302002122003'; -- MEGY LIMAHELU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01709/012/247/2020', `cnopnt` = NULL, `cnosnt` = 'SNT-04527/012/248/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '199005172019022008'; -- MEILISA SYAHFITRI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04020/004/146/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198009222005012001'; -- MERLYN NOVITA HUTAGALUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01826/185/447/2021', `dtgltbnt` = '2026-06-30', `dtglkbnt` = '2031-06-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '197605062002121001'; -- MEYKEL ALDRIN RUMAGIT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03155/185/444/2017', `cnopnt` = '030716465026176', `cnosnt` = NULL WHERE `cnip` = '197912052003121001'; -- MHD RIZALDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02687/185/043/2017', `cnopnt` = 'PNT-00031/010/044/2024', `cnosnt` = NULL WHERE `cnip` = '198704102010121003'; -- M. IBNU PATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT - 05610/191/642/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199603262020122019'; -- MICHELIA LARASATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03433/185/543/2021', `dtgltbnt` = '2026-06-30', `dtglkbnt` = '2031-06-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198603172014091003'; -- M. IKHSAN KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08254/191/449/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197704242001122003'; -- MILA APRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09202/191/443/2024', `cnopnt` = '-', `cnosnt` = '-' WHERE `cnip` = '198905112019021003'; -- MILLY VAN ERICH SALY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08114/185/744/2018' WHERE `cnip` = '198307092010012002'; -- MIRDAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04263/063/845/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199012242019052001'; -- MIRNA HAMID
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02184/191/445/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199203282015041001'; -- MITRAVIANUS RATU SAMEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03152/185/441/2017' WHERE `cnip` = '197907012005011001'; -- M. NOR ASRORI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02215/087/940/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197004082005011001'; -- MOCHAMAD HENDY FATAHILLAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-13734/001/648/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '199603262019021006'; -- MOH. ABDAI RATHOMY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07961/087/243/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198407122005011003'; -- MOHAMAD ARIEF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07644/063/941/2024' WHERE `cnip` = '198301072003121001'; -- MOHAMAD HURI A.MD.KEP
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02692/185/149/2017' WHERE `cnip` = '197709262007101001'; -- MOHAMAD IKHSAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01549/088/649/2017' WHERE `cnip` = '196404111986031003'; -- MOHAMAD MUSTARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01017/026/549/2021', `dtgltpnt` = '2026-01-30', `dtglkpnt` = '2031-01-30', `dtglsertifikat` = '2026-01-30', `dtglkadaluarsa` = '2031-01-30' WHERE `cnip` = '197805142001121001'; -- MOHAMMAD ADI HARTONO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02851/045/246/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '199408012019021003'; -- MOHAMMAD BAHRUDDIN DAFIQ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01244/191/041/2025', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198709152019022005'; -- MONA ASRIATI, S. SOS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03763/016/749/2024', `cnosnt` = NULL WHERE `cnip` = '197404011998011001'; -- M RANIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08820/185/148/2020' WHERE `cnip` = '198405312009031005'; -- MUH. ABID
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '197510132005011001'; -- MUHAJIR RACHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08259/185/644/2018' WHERE `cnip` = '197811092009101001'; -- MUHAMAD HARYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05587/061/245/2024' WHERE `cnip` = '196811062007011028'; -- MUHAMAD MAKATITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02813/185/244/2017' WHERE `cnip` = '197609192008101001'; -- MUHAMAD MAKMUR RIZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01586/185/840/2019' WHERE `cnip` = '197608162009041001'; -- MUHAMAD SA BANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00374/060/744/2018', `dtgltbnt` = '2023-03-21', `dtglkbnt` = '2028-03-21', `cnopnt` = NULL, `cnosnt` = 'SNT-07678/060/748/2021', `dtgltsnt` = '2021-08-23', `dtglksnt` = '2026-08-23', `dtglsertifikat` = '2021-08-23', `dtglkadaluarsa` = '2026-08-23' WHERE `cnip` = '197310152006041002'; -- MUHAMAD TAUFIQ RAMADHAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-06574/401/742/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197105311991031001'; -- MUHAMMAD ALI FAINALUDIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03621/421/342/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198605312010011009'; -- MUHAMMAD AS`AD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '197402272005011001'; -- MUHAMMAD ICHWAN NASUTION
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05632/420/846/2024', `dtgltpnt` = '2024-06-28', `dtglkpnt` = '2029-06-28', `dtglsertifikat` = '2024-06-28', `dtglkadaluarsa` = '2029-06-28' WHERE `cnip` = '198606172014041003'; -- MUHAMMAD IRAWAN PRASETYO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05302/087/640/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199108082015041001'; -- MUHAMMAD NOOR GINANJAR JAELANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00155/191/641/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = 'PNT-06051/087/642/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197210062009101001'; -- MUHAMMAD RIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08950/185/942/2020', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '199005232019021005'; -- MUHAMMAD RUSLAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01394/017/647/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198204202010121002'; -- MUHAMMAD SYAFRAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08876/062/249/2023' WHERE `cnip` = '197805022006041008'; -- MUHD SAFIE SYAHRUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05280/185/845/2020', `cnopnt` = 'PNT-00052/060/847/2021', `cnosnt` = 'SNT-06935/060/843/2021' WHERE `cnip` = '197205312005011001'; -- MUKHSADAT DAHLAN, S.T., M.Pd
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '038/J18.1/LL', `cnosnt` = NULL WHERE `cnip` = '197903032010011021'; -- MULYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10295/185/347/2020', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = 'SNT-07890/022/344/2024', `dtgltsnt` = '2024-09-18', `dtglksnt` = '2029-09-18', `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '197811152003122001'; -- MULYANTI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = 'SNT-04178/421/040/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197101102001121002'; -- MULYONO BURHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06248/175/640/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-19802/191/640/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197910092014082001'; -- MUNAWWARA R
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09368/175/546/2022', `cnosnt` = NULL WHERE `cnip` = '197608222002121003'; -- MURDIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03487/087/342/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = 'PNT-19805/087/343/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198504242009102002'; -- MURSALAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08115/185/245/2018' WHERE `cnip` = '197408302005011002'; -- MUS MULYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03186/185/748/2017' WHERE `cnip` = '197605182009122001'; -- MUSRIATUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02537/009/347/2024', `cnosnt` = 'SNT-08153/009/347/2023' WHERE `cnip` = '198604232015041001'; -- MUSTAMID
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-05350/030/143/2023', `dtgltsnt` = '2023-06-26', `dtglksnt` = '2028-06-26', `dtglsertifikat` = '2023-06-26', `dtglkadaluarsa` = '2028-06-26' WHERE `cnip` = '197803122001121003'; -- MUSTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02768/185/943/2017', `cnosnt` = NULL WHERE `cnip` = '198909032014042001'; -- MUSTIKAWATI TYAS UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04025/191/541/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198009082005012014'; -- MUTIA M. PAPUKE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09471/008/041/2019' WHERE `cnip` = '197609082009042002'; -- MUZWITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02814/185/455/2017' WHERE `cnip` = '197812242003122002'; -- NADIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02946/191/651/2025' WHERE `cnip` = '198708032009122007'; -- NADIA MUKHLISA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00050482/121/3005/114/2022' WHERE `cnip` = '196606251988031001'; -- NANA MULYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01584/185/458/2019' WHERE `cnip` = '197911052010121002'; -- NANANG
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10350/172/059/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = 'PNT-10350/172/059/2025', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198402062010121006'; -- NANDANA ADITYA BHASWARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03180/191/752/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '197204042002121001'; -- NASRUL SJAHRIAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03472/185/356/2018' WHERE `cnip` = '197203102007012025'; -- NATALIA KOLO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03849/185/054/2018', `cnosnt` = 'SNT-00676/405/059/2022' WHERE `cnip` = '198202172009022007'; -- NELLAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05627/191/050/2023', `cnopnt` = NULL, `cnosnt` = 'SNT-03435/087/055/2022' WHERE `cnip` = '198603302010122005'; -- NENENG RACHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01029/191/852/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197707072001122002'; -- NETI HERAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01737/087/658/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197908112005012002'; -- NIKNIK KARTIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02727/191/558/2023', `dtgltbnt` = '2023-07-03', `dtglkbnt` = '2028-07-03', `cnopnt` = NULL, `cnosnt` = 'SNT-08407/060/559/2021', `dtgltsnt` = '2026-06-30', `dtglksnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '197901262002122002'; -- NILAM SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03504/191/252/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197710252003122002'; -- NIMA LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03117/185/552/2017' WHERE `cnip` = '197809292005012001'; -- NINA HARTINJUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07065/185/258/2018' WHERE `cnip` = '198412252009122005'; -- NINA INDRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10247/185/854/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199510032019022015'; -- NI PUTU KRISNADEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09363/185/351/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198303092005012001'; -- NI PUTU SRI EKA PURWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00619/191/556/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198612172019022003'; -- NITA DELIMA MALIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00492/191/255/2023', `cnopnt` = 'PNT-09589/440/251/2026', `dtgltpnt` = '2026-07-21', `dtglkpnt` = '2031-07-21', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-21', `dtglkadaluarsa` = '2031-07-21' WHERE `cnip` = '197605132003121002'; -- NOERZAL ZAINUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06573/016/151/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197411082006042012'; -- NOPSI SULARSI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05641/087/456/2022', `dtgltpnt` = '2022-06-16', `dtglkpnt` = '2027-06-16', `cnosnt` = NULL, `dtglsertifikat` = '2022-06-16', `dtglkadaluarsa` = '2027-06-16' WHERE `cnip` = '197812062005011001'; -- NOR ILMAN SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00735/185/655/2021', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = 'BNT-00735/185/655/2021', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197811092005011002'; -- NOVERI MAMBEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00169/017/556/2017' WHERE `cnip` = '197511012001122001'; -- NOVITA ANDRIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02558/191/150/2022', `dtgltbnt` = '2022-06-02', `dtglkbnt` = '2027-06-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2022-06-02', `dtglkadaluarsa` = '2027-06-02' WHERE `cnip` = '197811222003122001'; -- NOVITA PRIHATIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08351/185/157/2020', `cnopnt` = NULL WHERE `cnip` = '198106152015042001'; -- NUGRAHAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02831/185/754/2017' WHERE `cnip` = '198205112002122001'; -- NUNINGYARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01075/045/753/2017', `cnopnt` = NULL, `cnosnt` = 'SNT-04118/030/754/2023' WHERE `cnip` = '197711012010121002'; -- NUNUNG PRAMONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08821/185/459/2020' WHERE `cnip` = '198705312011012009'; -- NURAENI.S
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03158/185/357/2017' WHERE `cnip` = '196409042009102001'; -- NURAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04097/185/650/2018', `cnosnt` = 'SNT-01545/017/655/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197402122002122001'; -- NUR AKHIRINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03187/185/059/2017' WHERE `cnip` = '197208211998012001'; -- NURDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02491/182/956/2022', `dtgltpnt` = '2022-02-11', `dtglkpnt` = '2027-02-11', `cnosnt` = NULL, `dtglsertifikat` = '2022-02-11', `dtglkadaluarsa` = '2027-02-11' WHERE `cnip` = '197610052003121010'; -- NURDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01863/060/058/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197305142002122001'; -- NURHIKMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07450/046/756/2023', `cnosnt` = NULL WHERE `cnip` = '198501122010121003'; -- NURI MUGIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03434/185/354/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110302003122002'; -- NURLINDA SEPTIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09360/185/858/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903182002122001'; -- NURLISNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '196703251986031001'; -- NURRAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02791/185/659/2017' WHERE `cnip` = '197502022002122001'; -- NUR ROHMAH PURNANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01535/185/554/2019' WHERE `cnip` = '198801082015042003'; -- NURUL ATMA VITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00592/045/156/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198001112009122002'; -- NURUL FATIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10823/030/054/2018' WHERE `cnip` = '197509272002122001'; -- NURUL HIDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-01602/182/169/2025', `dtgltsnt` = '2025-03-27', `dtglksnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198910302019022005'; -- OCHTIMOTI FRIZIALOVI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02816/185/567/2017', `cnosnt` = 'SNT-02662/004/566/2023' WHERE `cnip` = '197410212003121001'; -- OKTA KURNIAWAN ABDILLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08966/185/469/2020', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '199410192019021008'; -- OKTOVIYAN CATUR HARIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03122/185/268/2017' WHERE `cnip` = '197302282008011008'; -- ONGKY HARTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01631/191/571/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199102222020122014'; -- PAULA MARTHINA RAROBONG
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-18872/039/576/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197903062005011001'; -- PETRUS MARTSEL WENJI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03161/191/81/2024' WHERE `cnip` = '196802202002121001'; -- PETRUS TOTU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07834/051/072/2022', `cnosnt` = NULL WHERE `cnip` = '199201262019021004'; -- PRASETYO ADI PANGESTU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03191/185/474/2017' WHERE `cnip` = '197205282003121001'; -- PRAYITNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02349/042/978/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197305042001122003'; -- PUJI HASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05229/009/978/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '199002172015041001'; -- PUJO SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03190/191/173/2025', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197902032001122001'; -- PURWANDANI RATIH RUSWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09834/191/774/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '197410142008102001'; -- PURWANTI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04769/017/576/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198709292019022005'; -- PUTRI ARUM LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10272/185/092/2020' WHERE `cnip` = '199204142019022010'; -- RADEN RORO AYU HESTI PUSPANINGTYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08824/185/592/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197205012006041024'; -- RAHMAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03876/185/094/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198505022005011002'; -- RAHMAT HIDAYATULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01131/045/896/2017' WHERE `cnip` = '198109192008122001'; -- RAHMAWATI ARDIYAN ARMILA LANAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03905/191/197/2018' WHERE `cnip` = '198102192010122004'; -- RAHMIATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02248/191/896/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197906062003122002'; -- RAHMI YUNITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03935/191/990/2023' WHERE `cnip` = '198711112014042001'; -- RAIS IIS SOHIDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06151/185/193/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnosnt` = 'SNT-07256/060/190/2021', `dtgltsnt` = '2026-07-30', `dtglksnt` = '2031-07-30', `dtglsertifikat` = '2026-07-30', `dtglkadaluarsa` = '2031-07-30' WHERE `cnip` = '197610072010121002'; -- RAMADHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02696/185/193/2017' WHERE `cnip` = '198306222015041001'; -- RAMDAN KUDRAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08452/185/699/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198910172010122006'; -- RATNA ENDAH PRIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07010/185/298/2018' WHERE `cnip` = '197103102003122001'; -- RENI ENDANG TRIKUSUMASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08931/185/091/2020', `cnopnt` = NULL, `cnosnt` = 'BNT-08931/185/091/2020' WHERE `cnip` = '199410242019022009'; -- RENI YULIANA PRATIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04611/191/692/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197606252003122002'; -- RENNY YUSTIYAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04112/191/598/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199702072020122014'; -- RESI FEBRI DWIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01367/088/197/2020' WHERE `cnip` = '197503242001122001'; -- RETNO AMINARSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03160/185/990/2017' WHERE `cnip` = '197703112009102001'; -- RETNO WAHYU LESTARI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09262/030/099/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197905272003122002'; -- RETNO WIJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09281/191/290/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199407202019022005'; -- REVINA RIANDINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03435/183/595/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197710282002122003'; -- RIA EKAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01090/065/690/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '199212112015042002'; -- RIA NATALIA DIANTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04107/185/192/2018' WHERE `cnip` = '198305052010122007'; -- RIANNY ANNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10582/050/196/2018' WHERE `cnip` = '198908242008012001'; -- RIA RIZKHI RAFALDINI HIOLA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01526/185/994/2021', `dtgltbnt` = '2026-06-30', `dtglkbnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198003262002122001'; -- RIA WIDIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08074/009/599/2021', `dtgltpnt` = '2021-08-31', `dtglkpnt` = '2026-08-31', `cnosnt` = NULL, `dtglsertifikat` = '2021-08-31', `dtglkadaluarsa` = '2026-08-31' WHERE `cnip` = '197809292003121004'; -- RICHARDON SINAGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03403/062/190/2021', `cnosnt` = NULL WHERE `cnip` = '197307042000031008'; -- RIDWAN ALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08412/185/195/2020', `cnosnt` = 'SNT-16736/087/193/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198104172014041002'; -- RIDWAN NOOR HAKIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06518/191/490/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198701082020121007'; -- RIJALUL HAQ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08135/440/797/2024', `cnosnt` = NULL WHERE `cnip` = '198106022006042001'; -- RIKA ERNITA MEKUO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02340/191/499/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197312292002121001'; -- RIKI KURNIAWANSYAH ST
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08118/185/298/2018' WHERE `cnip` = '197501272003122002'; -- RINA KARUNIA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00087/030/595/2020' WHERE `cnip` = '196910182003122001'; -- RINA SETYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08245/008/999/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198412042010012017'; -- RINA ZULIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03436/185/896/2018' WHERE `cnip` = '197208102003122001'; -- RINI WIDIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05739/191/494/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198806112010012002'; -- RINNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04119/191/495/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199811232020121002'; -- RIO SUSANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02579/191/093/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198702122020122010'; -- RISKA DWI SETIYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04315/191/393/2024', `dtgltbnt` = '2024-07-01', `dtglkbnt` = '2029-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-07-01', `dtglkadaluarsa` = '2029-07-01' WHERE `cnip` = '199102092020122012'; -- RISMA HAMRYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01924/010/196/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = 'SNT-16999/402/194/2025', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197706292001122002'; -- RITA YENIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-04178/031/490/2024' WHERE `cnip` = '197506152002121007'; -- RIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07013/185/291/2018', `cnopnt` = 'PNT-02696/054/293/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197901232003121002'; -- RIZAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08119/185/099/2018', `cnopnt` = 'PNT-04328/045/097/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198904182014041001'; -- RIZHA FAHMI RAMADHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09103/185/993/2020' WHERE `cnip` = '198505292019022001'; -- RIZKI NURSHANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01823/010/594/2024', `dtgltpnt` = '2024-03-05', `dtglkpnt` = '2029-03-05', `dtglsertifikat` = '2024-03-05', `dtglkadaluarsa` = '2029-03-05' WHERE `cnip` = '198406072019021004'; -- RIZKI RAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02699/185/196/2017', `cnopnt` = 'PNT-03424/031/193/2025', `cnosnt` = NULL WHERE `cnip` = '197306052001121001'; -- Dr. Rizqi, S.Pd. M.Pd.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '63013/MPK.A/RHS/KP.07.00/2021', `cnosnt` = '11578/C/KP.07.00/2021' WHERE `cnip` = '196702041996101001'; -- ROBERT MARYEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08453/185/490/2018' WHERE `cnip` = '197612262005012002'; -- ROHAIDAH NASUTION
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01538/185/997/2019' WHERE `cnip` = '198204052005012014'; -- ROHMATUL LUTFIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07051/191/393/2023', `dtgltbnt` = '2023-12-14', `dtglkbnt` = '2028-12-14', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2023-12-14', `dtglkadaluarsa` = '2028-12-14' WHERE `cnip` = '197904212005011003'; -- ROMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-03756/037/691/2024' WHERE `cnip` = '197608052005011002'; -- RONI KARSIDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08454/185/591/2018' WHERE `cnip` = '198802072015042006'; -- ROSIANADEWI DINARYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05927/012/393/2024', `cnosnt` = NULL WHERE `cnip` = '198704222010122008'; -- ROSI PURWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08827/185/995/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196702221992032003'; -- ROSMAWATI SULAEMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03474/185/498/2018' WHERE `cnip` = '196301311988032007'; -- ROSTATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08120/185/991/2018' WHERE `cnip` = '197211172009012002'; -- ROSTATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03826/191/999/2025', `dtgltbnt` = '2025-07-02', `dtglkbnt` = '2030-07-02', `cnopnt` = '101690775013928', `dtglsertifikat` = '2025-07-02', `dtglkadaluarsa` = '2030-07-02' WHERE `cnip` = '199012252015041002'; -- ROY NALDO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00032212/121/3005/114/2023' WHERE `cnip` = '197802222008101001'; -- R SHANDIE HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-07336/054/799/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197910282003121002'; -- Rudi
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08362/001/799/2023' WHERE `cnip` = '197301241994032001'; -- RUSDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00352/038/295/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198007072009122004'; -- RUSMAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02948/062/593/2020', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197411202003121001'; -- RUSTAM HASIM
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02490/182/395/2022' WHERE `cnip` = '198908262019021004'; -- RUSTAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-01617/001/805/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197504022006042005'; -- SAFRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02819/185/200/2017' WHERE `cnip` = '196601182002121001'; -- SAHDAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03475/185/509/2018' WHERE `cnip` = '196709031989031010'; -- SAHRAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09663/785/104/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197405232008011002'; -- SAHRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02795/185/203/2017' WHERE `cnip` = '197607112008101002'; -- SAMSUDIN ADAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03852/185/008/2018', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '197703212005011002'; -- SAMSURI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03195/185/208/2017' WHERE `cnip` = '197112012003122001'; -- SANDY YUCEMIARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03196/185209/2017', `cnopnt` = NULL, `cnosnt` = 'SNT-04772/054/200/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198410182008012003'; -- SANTI FAJRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-06764/432/803/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198009012003122002'; -- SANTY MUKTI MARDHIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03887/065/906/2022', `dtgltpnt` = '2022-03-29', `dtglkpnt` = '2027-03-29', `cnosnt` = NULL, `dtglsertifikat` = '2022-03-29', `dtglkadaluarsa` = '2027-03-29' WHERE `cnip` = '197311252002122002'; -- SARCE PALLANGAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02696/191/103/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198809062010122004'; -- SARI ESA PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01539/185/208/2019' WHERE `cnip` = '198309022008012006'; -- SEPTA MARANTIKA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05962/430/402/2023', `dtgltpnt` = '2023-07-04', `dtglkpnt` = '2028-07-04', `dtglsertifikat` = '2023-07-04', `dtglkadaluarsa` = '2028-07-04' WHERE `cnip` = '197512182003122001'; -- SHINTA HENY NINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08121/185/202/2018' WHERE `cnip` = '197202012002122001'; -- SILVA DWI AQUARIYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03923/185/507/2018' WHERE `cnip` = '197607142003122001'; -- SILVY WIDYASTUTY MIOLO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03476/185/400/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196310132014081001'; -- SINYO DUMANAU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06694/191/505/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199208242020122023'; -- SISILIA DOBE LAKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07918/185/605/2020' WHERE `cnip` = '196905122003122001'; -- SITI HANDAYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03907/185/809/2018' WHERE `cnip` = '197906152003122002'; -- SITI MARYUNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02796/185/104/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198405312009122002'; -- SITI MUNIRA SAAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03853/185/709/2018' WHERE `cnip` = '196811011990012001'; -- SITI ROLIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01122/191/906/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197607182002122001'; -- SITI RUYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08456/185/003/2018' WHERE `cnip` = '196810052005012014'; -- SITTI KAHIRAH ADAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT--6714/039/908/2018' WHERE `cnip` = '198110182011012003'; -- SIXTA OKTAVIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04058/046/507/2022', `cnosnt` = 'SNT-03625/046/506/2023' WHERE `cnip` = '197512192003121001'; -- SOERJO ADI POERNOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03029/026/804/2020', `dtgltbnt` = '2025-01-23', `dtglkbnt` = '2030-01-23', `cnopnt` = NULL, `cnosnt` = 'SNT-11022/026/806/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-01-23', `dtglkadaluarsa` = '2030-01-23' WHERE `cnip` = '197704282002122002'; -- SOFIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01013/016/305/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198309122002121004'; -- SOFIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07072/185/46/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903252007012001'; -- SOFIANA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04057/046/506/2022' WHERE `cnip` = '198408232008012007'; -- SOFIA NUR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '00003060/121/3005/114/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197711152009011008'; -- SOFYAN HADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03855/185/901/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-09367/008/905/2022' WHERE `cnip` = '196901121990032005'; -- SRI MELIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00538/088/306/2018', `cnopnt` = NULL WHERE `cnip` = '197205091993032005'; -- SRI MULYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04099/185/702/2018' WHERE `cnip` = '197007032005012001'; -- SRI NURHAJATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02351/042/401/2017' WHERE `cnip` = '198111302002122001'; -- SRI RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02836/185/709/2017' WHERE `cnip` = '197411222003122001'; -- SRI RATNANIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02799/185/907/2017' WHERE `cnip` = '196610151988032001'; -- SRI SULASTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04100/185/105/2018' WHERE `cnip` = '196405061985032003'; -- SRI TUTIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00760/191/003/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197204252005012001'; -- SRI UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01310/088/305/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196603172009102001'; -- SRI WENING SULISTYANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04625/191/607/2024', `dtgltbnt` = '2024-07-01', `dtglkbnt` = '2029-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-07-01', `dtglkadaluarsa` = '2029-07-01' WHERE `cnip` = '197007112002122001'; -- SRI WIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05456/191/700/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2023-10-02', `dtglkadaluarsa` = '2028-10-02' WHERE `cnip` = '197404022002121001'; -- STANISLAUS AGUNG BUDIWIDODO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10299/185/901/2020' WHERE `cnip` = '196612312005012001'; -- ST.JAMILAH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-02692/417/509/2021', `dtgltsnt` = '2021-10-13', `dtglksnt` = '2026-10-13', `dtglsertifikat` = '2021-10-13', `dtglkadaluarsa` = '2026-10-13' WHERE `cnip` = '197102141997031004'; -- SUCIPTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02352/042/002/2017' WHERE `cnip` = '198201092002122001'; -- SUCI REZEKI HARYANTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02800/185/500/2017' WHERE `cnip` = '196805152002121012'; -- SUDARMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07015/185/303/2018' WHERE `cnip` = '198404072014041001'; -- SUGENG PAMINTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01557/088/708/2017' WHERE `cnip` = '197503112009101002'; -- SUGIYARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02750/185/004/2017' WHERE `cnip` = '197612222005011003'; -- SUGIYONTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-12366/179/808/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197205312007011001'; -- SUHARNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07016/185/404/2018', `cnosnt` = 'BNT-07016/185/404/2018' WHERE `cnip` = '198306252006051001'; -- SUKAMTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03438/185/108/2018' WHERE `cnip` = '197506302005011001'; -- SUKARNO HADI SAPUTRO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04323/185/302/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '197609292003122001'; -- SULISTIYO RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05110/009/207/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198312262019021003'; -- SULISTYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04109/185/804/2018' WHERE `cnip` = '197603022002121003'; -- SUMARDDI MARKOS IGIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '02218/191/503/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197101062002121005'; -- SUMARNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03478/185/702/2018', `cnosnt` = NULL WHERE `cnip` = '196701211991031003'; -- SUMARNO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-03268/063/709/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198101162005011001'; -- SUMEDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01558/088/009/2017' WHERE `cnip` = '197007062007011001'; -- SUPANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197509222003122003'; -- SUPIAH DJAFAR. BAUW
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00092/030/401/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197702082005012003'; -- SUPRIYANTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06544/191/309/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199408112020122021'; -- SURTI MULYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02775/185/501/2017' WHERE `cnip` = '198012132003121002'; -- SURYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06894/430/007/2025', `dtgltpnt` = '2025-09-30', `dtglkpnt` = '2030-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197910032003122002'; -- SURYA MARLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01484/054/307/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197607122003122001'; -- SURYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06550/191/006/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '196904101998021001'; -- SURYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01260/031/309/2016' WHERE `cnip` = '197303191994032001'; -- SUSKANDANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03479/185/403/2018' WHERE `cnip` = '196904232008012011'; -- SUYATMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03880/185/309/2018' WHERE `cnip` = '197401101994031003'; -- SYAHBUDDIN HUSEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08426/185/500/2018', `cnopnt` = 'PNT-06249/087/501/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197808112005012001'; -- SYAHDA SUKMA INDIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02801/185/301/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198111022010121003'; -- SYAHRUL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11082/185/702/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196509252000122003'; -- SYAINAL
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-16734/001/201/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198111012002121004'; -- SYAMSUAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09721/061/209/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-02724/061/205/2022' WHERE `cnip` = '197606212001121002'; -- SYAMSUDIN WAGOLA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-', `cnopnt` = NULL, `cnosnt` = 'SNT-07740/416/008/2022' WHERE `cnip` = '196808171998011002'; -- SYAMSURI, S.Pd
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03950/185/807/2021', `dtgltbnt` = '2021-10-01', `dtglkbnt` = '2026-10-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2021-10-01', `dtglkadaluarsa` = '2026-10-01' WHERE `cnip` = '199409242019022014'; -- SYARIFAH NABILA NOOR AFIQA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00249/026/625/2024', `dtgltsnt` = '2024-01-08', `dtglksnt` = '2029-01-08', `dtglsertifikat` = '2024-01-08', `dtglkadaluarsa` = '2029-01-08' WHERE `cnip` = '197903072002122002'; -- TATIK LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08828/185/126/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198510252019021002'; -- TEDDY HARTA SURYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08959/185/921/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198712102019021002'; -- TELSAR SUHARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03741/191/425/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199405242019022009'; -- TESSA SILVANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00495/042/528/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198001242002121002'; -- THAMAR QALBAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00721/191/120/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = 'SNT-00702/039/129/2024', `dtgltsnt` = '2024-01-16', `dtglksnt` = '2029-01-16', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198307032010011018'; -- THOMAS KRISTOFORUS OB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10286/185/527/2020' WHERE `cnip` = '196705161990032001'; -- TINI SUPARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnosnt` = 'SNT-08652/022/921/2024' WHERE `cnip` = '196910032002122002'; -- TITIK MUSLIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03128/185/024/2017' WHERE `cnip` = '198210092009101001'; -- TONI SETIJAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT.03851/015/627/2023', `cnosnt` = NULL WHERE `cnip` = '197008292003121001'; -- TRIADY PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02837/185/620/2017' WHERE `cnip` = '197904152005012005'; -- TRI NENGAH APRIFIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05678/191/226/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '197503252005011002'; -- TRIONO BUDI SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04102/185/427/2018' WHERE `cnip` = '197804232009102002'; -- TRISNA HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02938/185/922/2021' WHERE `cnip` = '197407102008101001'; -- TRI WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02802/185/922/2017' WHERE `cnip` = '196412151993101001'; -- TRIYATNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09084/087/021/2022', `cnosnt` = NULL WHERE `cnip` = '197811032007011001'; -- TRIYONO RAHARJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02776/185/622/2017' WHERE `cnip` = '196203051986021001'; -- TUKIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02777/185/223/2017' WHERE `cnip` = '197208142002121003'; -- TUKIMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '00000189/121/3005/114/2024' WHERE `cnip` = '198906142014042001'; -- TUTI YUNI ASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02808/407/928/2021', `cnosnt` = NULL WHERE `cnip` = '197708162001122001'; -- TUTY RAMADHANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03916/087/839/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '198102252003122002'; -- UCE VERIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01589/185/733/2019', `cnopnt` = 'PNT-03821/182/734/2022', `dtgltpnt` = '2022-03-29', `dtglkpnt` = '2027-03-29', `dtglsertifikat` = '2022-03-29', `dtglkadaluarsa` = '2027-03-29' WHERE `cnip` = '197403032002121001'; -- UJANG GURCITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09358/185/095/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196809162002122002'; -- UMI HABIBAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02350/042/730/2017', `cnosnt` = 'SNT-00454/440/733/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198409242008012003'; -- URAI WINDA FIDYA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04933/406/539/2023', `cnosnt` = 'SNT-02805/440/535/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197601012008011023'; -- URSIDA RAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00613/088/930/2018' WHERE `cnip` = '197909132001122001'; -- USWATUN HASANAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02939/191/633/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198410122009121007'; -- UTAMA SINGGIH BUDIARSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05060/191/941/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199202242019022007'; -- VENY YOHAN SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03926/185/140/2018' WHERE `cnip` = '198307122010121003'; -- VICTOR KRISNAWAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04119/015/745/2023' WHERE `cnip` = '198611102015042005'; -- VONA MAYASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01299/191/051/2022', `dtgltbnt` = '2022-04-13', `dtglkbnt` = '2027-04-13', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2022-04-13', `dtglkadaluarsa` = '2027-04-13' WHERE `cnip` = '198012092002121001'; -- WAHYUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11254/428/453/2023', `cnosnt` = NULL WHERE `cnip` = '198011132005011001'; -- WAHYUDI SANAKY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01102/191/354/2024', `cnopnt` = '-', `cnosnt` = 'SNT-00030/010/353/2024' WHERE `cnip` = '198005192003121001'; -- WAHYUDI WAHID
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03924/191/558/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199105192019022004'; -- WAN ANNISYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08935/191/755/2023', `cnosnt` = NULL WHERE `cnip` = '197403212002121001'; -- WARIS HANDOYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01371/185/452/2021', `dtgltbnt` = '2026-06-28', `dtglkbnt` = '2031-06-28', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-06-28', `dtglkadaluarsa` = '2031-06-28' WHERE `cnip` = '198008172009102001'; -- WARIYEM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09748/061/858/2018' WHERE `cnip` = '197412312002121005'; -- WENLY DONALT TUHUMURY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02778/185/754/2017' WHERE `cnip` = '197811282009102001'; -- WETI YULIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03439/185/559/2018' WHERE `cnip` = '198103122010121002'; -- WIWIN MUTTAQIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07107/050/255/2024', `cnosnt` = NULL WHERE `cnip` = '198001122008101002'; -- WIWIN SURIADI BOKINGO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08470/185/059/2020', `cnosnt` = NULL WHERE `cnip` = '197908242005011001'; -- WULANDORO SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02565/014/078/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '197808252002122002'; -- YAYUK RAHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08523/185/678/2018' WHERE `cnip` = '197105302008102001'; -- YENI ARIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03440/185/871/2018', `cnopnt` = NULL, `cnosnt` = 'SNT-01629/043/878/2023' WHERE `cnip` = '197903092003122001'; -- YENNY MAYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03168/185/278/2017' WHERE `cnip` = '197606302009102001'; -- YOANNA CIPTASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10774/191/479/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199505052020122036'; -- YOHANA NOVITA BR PANGARIBUAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197806252001122001'; -- YOSTETI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07598/643/379/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197902052007101001'; -- YOTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03131/185/578/2017' WHERE `cnip` = '197504272005011001'; -- YUDI YULIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00668/060/570/2016', `dtgltbnt` = '2022-06-17', `dtglkbnt` = '2027-06-17', `cnopnt` = NULL, `cnosnt` = 'SNT-08420/060/574/2021', `dtgltsnt` = '2026-06-30', `dtglksnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '197704252001122001'; -- YULIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06305/185/874/2020' WHERE `cnip` = '196707081988032001'; -- YULI MARYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03481/185/876/2018' WHERE `cnip` = '196705281993032009'; -- YULITA HANDINI IRA WIBAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00524/050/371/2023', `cnosnt` = NULL WHERE `cnip` = '198007082008022001'; -- YULLIAN BAU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04110/185/476/2018' WHERE `cnip` = '197707122005011002'; -- YUSAR ISRAEL ANSHARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00028/050/470/2024' WHERE `cnip` = '198312282008101001'; -- YUSRI UNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02806/440/576/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197001072002121002'; -- YUSTUS AWOITAUW
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10273/185/273/2020' WHERE `cnip` = '198909152014041001'; -- YUSUF ANDRIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-064421 185167612021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198212122010121003'; -- YUSUF PABENDON
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08870/440/583/2026', `dtgltpnt` = '2026-07-08', `dtglkpnt` = '2031-07-08', `dtglsertifikat` = '2026-07-08', `dtglkadaluarsa` = '2031-07-08' WHERE `cnip` = '197807212008011009'; -- Zimmy Zulkarnaen Iman
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08476/185/185/2018' WHERE `cnip` = '198208122003121004'; -- ZULFAHMI PASARIBU
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06847/008/285/2021', `dtgltpnt` = '2026-06-30', `dtglkpnt` = '2031-06-30', `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '197205261993031003'; -- ZULFIRWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06443/185/687/2021', `dtgltbnt` = '2026-06-30', `dtglkbnt` = '2031-06-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-06-30', `dtglkadaluarsa` = '2031-06-30' WHERE `cnip` = '198206192003122001'; -- ZULFITRI B KUMURU
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-12365/004/087/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197312252003121001'; -- ZULHAM ISNAINI BOYAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02244/010/782/2020', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `cnosnt` = NULL, `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '197601032003121003'; -- ZULHENDRI WARIZONA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03882/185/781/2018' WHERE `cnip` = '198306192010011007'; -- ZULKARNAIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-19984/009/181/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197209122005011004'; -- ZULKARNAIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01395/017/188/2017', `cnopnt` = 'PNT-04167/017/188/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-03267/017/188/2026', `dtgltsnt` = '2026-03-31', `dtglksnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198702132010122004'; -- ZUMI ANGRAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06979/087/911/2023', `dtgltpnt` = '2023-08-09', `dtglkpnt` = '2028-08-09', `dtglsertifikat` = '2023-08-09', `dtglkadaluarsa` = '2028-08-09' WHERE `cnip` = '198011092009122004'; -- AKTERY PUSTAKA PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03818/191/510/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198505072018012003'; -- ASNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02755/185/819/2017', `cnopnt` = 'PNT-07466/087/813/2024', `dtgltpnt` = '2024-09-03', `dtglkpnt` = '2029-09-03', `dtglsertifikat` = '2024-09-03', `dtglkadaluarsa` = '2029-09-03' WHERE `cnip` = '197608072010122001'; -- ATIK SULISTYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08449/185/045/2018' WHERE `cnip` = '199209192015042002'; -- DEBORA MARSAULI SABRINA SINAGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08462/185/240/2018' WHERE `cnip` = '198707192010122007'; -- DESI WAHYUNINGTIAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07477/191/445/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '199012022015042003'; -- DEWI ANGGRAENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02734/185/246/2017' WHERE `cnip` = '197508202008122001'; -- DIAN RACHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01578/185/161/2019' WHERE `cnip` = '198710142015042003'; -- FATRACIA EMMA NAOMI BR SIMANJUNTAK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01577/185/690/2019' WHERE `cnip` = '198202132009122005'; -- IDAYU NURLAILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02742/185/795/2017' WHERE `cnip` = '197803092008121001'; -- I GUSTI NGURAH AGUNG KUSUMA JAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04682/087/990/2026', `dtgltbnt` = '2026-07-14', `dtglkbnt` = '2031-07-14', `dtglsertifikat` = '2026-07-14', `dtglkadaluarsa` = '2031-07-14' WHERE `cnip` = '198608252009121003'; -- IRFAN AMIR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06875/087/346/2023', `dtgltpnt` = '2023-08-02', `dtglkpnt` = '2028-08-02', `cnosnt` = NULL, `dtglsertifikat` = '2023-08-02', `dtglkadaluarsa` = '2028-08-02' WHERE `cnip` = '197505152008121002'; -- MUHAMMAD IHSAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03116/185/141/2017' WHERE `cnip` = '197008152005012002'; -- MULYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01292/088/054/2020', `cnopnt` = NULL WHERE `cnip` = '198511142010122005'; -- NIKEN SETYORINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01265/087/054/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198906072010122004'; -- Nurbayanti
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01306/088/690/2020' WHERE `cnip` = '198412012009122005'; -- RAHMANIA DYAH PRIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08422/185/796/2018' WHERE `cnip` = '197410052008102001'; -- RATNANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = 'SNT-19378/087/298/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197709092005012002'; -- RETNA CATUR WIJISARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07476/191/994/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '198209192015042005'; -- RITA MURTININGRUM
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-16733/087/800/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198503022014042003'; -- SAFRINA AYUNING WIYATHASARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06775/087/805/2023', `dtgltpnt` = '2023-07-27', `dtglkpnt` = '2028-07-27', `dtglsertifikat` = '2023-07-27', `dtglkadaluarsa` = '2028-07-27' WHERE `cnip` = '197912182008121002'; -- SARWIDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03199/185/722/2017' WHERE `cnip` = '196310071990021001'; -- TRI BUDI PRASASTYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07017/185/155/2018' WHERE `cnip` = '199001012015042003'; -- WAHYU KARTIKA WIJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03910/185/513/2017' WHERE `cnip` = '198801262014042002'; -- A.A.AYU PUTRI WIDYANTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00001/026/511/2018' WHERE `cnip` = '197706052005021001'; -- A`AD YUNIARSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02431/020/510/2020' WHERE `cnip` = '197808022007011024'; -- AAN FARHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '1424/2.3.1.2.8/03/00/2013' WHERE `cnip` = '196706161987021001'; -- ABD RAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04240/185/910/2017', `cnopnt` = NULL WHERE `cnip` = '197012271991031002'; -- ABDUL AZIZ LAOMEUTIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04326/191/315/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197104102000031001'; -- ABDUL KADIR RAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07903/185/919/2020' WHERE `cnip` = '196611141998031002'; -- ABDULLAH HADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02172/087/212/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198005272015041001'; -- ABDUL MUTA`ALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09010/185/610/2018', `cnopnt` = 'PNT-01960/022/916/2022' WHERE `cnip` = '198502042008121001'; -- ABDUL RACHMAN FAUZIE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07538/060/413/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197902242009121003'; -- ABDUL SALAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04735/185/219/2018' WHERE `cnip` = '197111112005011002'; -- ABD. WAHED
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00079/022/516/2017' WHERE `cnip` = '196707052001121002'; -- ACEP HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04736/185/210/2018' WHERE `cnip` = '197909072008101001'; -- ACHMAD FADILAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05278/185/112/2019' WHERE `cnip` = '199012092015041003'; -- ACHMAD RIDWAN SHOLEH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03803/414/444/2021', `cnosnt` = NULL WHERE `cnip` = '195910091986021001'; -- ACHMAD SJAIFULLAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01546/045/796/2020' WHERE `cnip` = '196601041991031002'; -- ACHMAD SYAMSU HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00045/026/419/2020' WHERE `cnip` = '198406152008011002'; -- ACMAD RIFAI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08844/185/914/2018' WHERE `cnip` = '198509162014092003'; -- ADCHA MAZIYAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05368/010/212/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '196906291999031001'; -- ADE FIRMANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '10868/020/313/2022' WHERE `cnip` = '197502092005011001'; -- ADE HILMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02953/010/619/2023' WHERE `cnip` = '198808112010122006'; -- ADELIA PRAMITA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04944/185/311/2017' WHERE `cnip` = '198310102005012001'; -- ADELINA KNAOFMONE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07952/185/013/2020', `cnosnt` = 'BNT-07952/185/013/2020' WHERE `cnip` = '197311082008102001'; -- ADE NOVIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04144/185/113/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198212262006041004'; -- ADE PUTRA DHARMAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06554/185/710/2020' WHERE `cnip` = '198006302005012002'; -- ADE SURYANI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00534/024/312/2020' WHERE `cnip` = '197904122006041008'; -- ADE SYARIEF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01591/185/306/2019' WHERE `cnip` = '196912051992032002'; -- SITI SOIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12213/190/209/2018', `cnosnt` = 'SNT-03386/031/200/2020', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '198312262005011001'; -- SLAMET MUHARYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06779/191/139/2023', `dtgltbnt` = '2023-10-02', `dtglkbnt` = '2028-10-02', `dtglsertifikat` = '2023-10-02', `dtglkadaluarsa` = '2028-10-02' WHERE `cnip` = '199710312020122012'; -- UUN MAEMUNAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01316/191/971/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198201262009122003'; -- YANUAR MAULIANI PAMUNGKAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07194/185/471/2020', `dtgltbnt` = '2026-02-18', `dtglkbnt` = '2031-02-18', `dtglsertifikat` = '2026-02-18', `dtglkadaluarsa` = '2031-02-18' WHERE `cnip` = '198107172006042001'; -- YULI NURKHAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09100/185/280/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199509272019022008'; -- ZAHROTUN NISA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08331/185/915/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197204152001121003'; -- AHMAD GAZALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09093/185/511/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198112122001121002'; -- AMIR YUSFANI YUNUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02456/185/517/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197401302007011001'; -- ANWAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07662/191/111/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198207132014091002'; -- ARDIYANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05912/185/817/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198103242009101001'; -- ARFAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08584/185/215/2020' WHERE `cnip` = '196803232005012001'; -- ASDIANAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05416/185/616/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197606162014092005'; -- ASNIATY CELLENG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07663/191/122/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197712312001122001'; -- BETI SAPADA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08461/185/969/2020' WHERE `cnip` = '197409272006042001'; -- FACHIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08431/185/966/2020' WHERE `cnip` = '198403132014091001'; -- FIRMAN DJAMAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08813/185/460/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198509022014092001'; -- FITRIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01139/185/184/2021' WHERE `cnip` = '197104272007012001'; -- HAMIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08387/185/186/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197804022007011001'; -- HASANING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08543/185/880/2020' WHERE `cnip` = '197304042008102001'; -- HASNAH BANDANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08388/185/787/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197407182007011001'; -- HERIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02879/185/496/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197207082014091002'; -- IDRIS KHAERUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08104/185/913/2018', `cnopnt` = 'PNT-01925/191/917/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198010282014091001'; -- ADRIANUS PATIUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197807272014091001'; -- AGUNG SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10083/088/212/2019', `cnosnt` = NULL WHERE `cnip` = '197306152009101001'; -- AGUNG WIJAYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07054/185/76/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197908122009102001'; -- ATIKA ROCHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '040719280029686' WHERE `cnip` = '197508092003121002'; -- BANGKIT ARI MURTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09290/088/820/2019', `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '198503022008011001'; -- BAYU FARADISSA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12696/021/394/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198907272015042005'; -- EKA YULI ARISANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03107/185/151/2017' WHERE `cnip` = '197805102001122001'; -- ERMA HERAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '198404192014042002'; -- ESKAWATI MUSYAROFAH BUNYAMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00924/185/265/2021' WHERE `cnip` = '198602242019021002'; -- FACHRI MIRZANTHA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01926/191/588/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197302212005012002'; -- HERNITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00334/088/500/2019', `cnopnt` = NULL WHERE `cnip` = '197707312002121001'; -- JULIASMORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08163/185/738/2020' WHERE `cnip` = '199009182014042001'; -- LAILA NASYALIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11091/185/632/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198212212014042001'; -- LILIS LISTRIANA LESTARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '021123127587540' WHERE `cnip` = '196808231989011001'; -- MARSUDI UTOMO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04168/191/549/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198902242015041002'; -- MUHAMAD HABIB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09141/087/855/2022' WHERE `cnip` = '197411052009101002'; -- NAHRUN BUDI SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08116/185/356/2018' WHERE `cnip` = '198003112014041001'; -- NANANG SUKMANA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197804232001122001'; -- PIPIN DWI NUGRAHENI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197706032005011004'; -- PITOYO NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08032/185/293/2020', `cnopnt` = 'PNT-05797/191/298/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198102012014091004'; -- RINALDO FEBRIYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07069/185/32/2018' WHERE `cnip` = '198112012015042001'; -- RITA SUGIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'SNT-03104/030/308/2023', `cnopnt` = NULL, `cnosnt` = 'SNT-03104/030/308/2023' WHERE `cnip` = '197803232005011002'; -- SIGIT NURIANTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01271/191/401/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199506222018012001'; -- SINTHYA INDRIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199504062018012002'; -- SOLICHATUN AISYAH RAHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10874/088/200/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196512261990021001'; -- SUPRIYANTA WIBAWA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03165/185/005/2017' WHERE `cnip` = '197701232008102001'; -- SUSI HARDATI WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09612/087/748/2022' WHERE `cnip` = '196605281994031001'; -- SUTRIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09609/185/374/2020' WHERE `cnip` = '199107062018011004'; -- YOGA YULIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02186/054/267/2017' WHERE `cnip` = '197007312005012001'; -- JOURIKE JEANE RUNTUWAROUW
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02181/049/612/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197402212009122001'; -- KAIRUPAN SONYA YURIKE VONNY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05419/185/099/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197302082006041001'; -- RICHARD HARYSON SEKEH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03912/185/745/2017' WHERE `cnip` = '198303212015042001'; -- DESAK GEDE SANTI ASTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03913/185/876/2017' WHERE `cnip` = '197908131999031001'; -- GEDE SUTAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06906/185/291/2019' WHERE `cnip` = '198805012010122004'; -- IDA AYU ARIE RISTADEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03917/185/390/2017' WHERE `cnip` = '198002032006042003'; -- IDA AYU EKA PRAMITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03918/185/791/2017' WHERE `cnip` = '198201152014092003'; -- IDA AYU SUSILAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03919/185/692/2017' WHERE `cnip` = '197801282001121003'; -- IDA BAGUS WIDIADNYANA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '196108271986011001'; -- I GST BGS WIKSUANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03914/185/697/2017' WHERE `cnip` = '198001252014092004'; -- I GUSTI AYU RATNA SANTIASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10254/185/192/2020' WHERE `cnip` = '198109302008121001'; -- I KETUT DIANA ADHI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '196512241995021001'; -- I KOMANG TEKEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197910172010121004'; -- I MADE SWADHARMA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03915/185/898/2017' WHERE `cnip` = '196904091999031001'; -- I NYOMAN ADNYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03305/045/011/2025', `dtgltpnt` = '2025-03-27', `dtglkpnt` = '2030-03-27', `cnosnt` = NULL, `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '198506102010121005'; -- ADIAT SURYA RAMADHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07328/030/210/2019' WHERE `cnip` = '196407231989031004'; -- AGENG PUJIHARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13110/054/916/2018' WHERE `cnip` = '196203281987031005'; -- ALIMIN PURBA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00054/022/319/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408122010122005'; -- ANGGI SUCIWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06560/030/517/2019' WHERE `cnip` = '198501292009121003'; -- ARIFIN B SAIBA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04087/191/719/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198603282019021003'; -- AGNI SAKTI PRIBADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09287/088/016/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198608082010121007'; -- AGUS WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02306/087/111/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197210292005011002'; -- ARIEF KUSDWIADNANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11097/185/538/2019' WHERE `cnip` = '198612172015042002'; -- LIA AMALIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04739/185/643/2017', `cnopnt` = NULL WHERE `cnip` = '198710282010121006'; -- Maulana Okto, S.Sos., M.AP
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00255/191/242/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197211102006042001'; -- VANI SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01323/156/919/2019' WHERE `cnip` = '198412312015042003'; -- A. IRMAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01128/156/082/2019' WHERE `cnip` = '198410252015042002'; -- HENNY SUKMAWATI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-10316/424/091/2023' WHERE `cnip` = '198211082011011010'; -- IRFAN DARMAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02123/156/648/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198203122009032001'; -- MUHRA NUR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02167/185/256/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197403262012122001'; -- NUR LAILI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01542/156/502/2019' WHERE `cnip` = '199002042015042005'; -- SRI RAMDHANI HAKIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '2' WHERE `cnip` = '196211051990021001'; -- ANAK AGUNG KETUT OKA ADNYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00706/037/413/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198904122014042001'; -- ANAK AGUNG PUTRI ARIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00923/037/144/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198304062005012001'; -- DESAK MADE PRIMA DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00697/037/842/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197711202010122004'; -- DEWA AYU SUNDEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02252/037/741/2022', `cnosnt` = NULL WHERE `cnip` = '198301142014041001'; -- DEWA GEDE SANJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00696/037/571/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197512192000122002'; -- GUSTI AYU SRI HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00704/037/891/2016', `cnopnt` = NULL, `cnosnt` = 'BNT-00704/037/891/2016' WHERE `cnip` = '198111162005012006'; -- IDA AYU PUTU SRI CITRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04197/037/591/2021', `cnosnt` = 'PNT-04197/037/591/2021' WHERE `cnip` = '198409042015021002'; -- I KETUT WAWAN ANDIKAYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04205/037/191/2021', `cnosnt` = NULL WHERE `cnip` = '198607282008011001'; -- I MADE AGUS WIGAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00698/037/113/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198505212008012001'; -- KETUT BAMBANG AYU WIDYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10244/185/641/2020' WHERE `cnip` = '199512182019032019'; -- MADE ALIT KUSUMA DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10251/185/859/2020' WHERE `cnip` = '198605272019032013'; -- NI KOMANG ARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00440/037/858/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198001272003122001'; -- NI LUH GEDE ARI ARYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-04019/419/754/2021' WHERE `cnip` = '197402042006042002'; -- NI LUH MADE SUWARYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04889/037/859/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198401052009122004'; -- NI PUTU TRISNA YUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01265/037/774/2019' WHERE `cnip` = '197902182006042003'; -- PUTU ANITA KRISTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02106/190/379/2019' WHERE `cnip` = '198006272005012001'; -- PUTU SRI WAHYUNI EMAWATININGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05530/185/813/2020' WHERE `cnip` = '198406282010122003'; -- AMI RAHMIANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08868/022/940/2021', `cnosnt` = 'SNT-08624/022/940/2021' WHERE `cnip` = '197207302003121001'; -- DADI SETIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08101/185/740/2020' WHERE `cnip` = '198505182014042002'; -- DINI ANISYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04525/185/156/2020' WHERE `cnip` = '198209202014042001'; -- EVI CAHYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02716/185/316/2019' WHERE `cnip` = '198204272014041002'; -- KHIAR WALI TSANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07605/022/158/2021' WHERE `cnip` = '198302172008012008'; -- NURAENY INDAHSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01844/022/397/2017', `cnosnt` = 'SNT-01443/022/392/2023' WHERE `cnip` = '197209052006041001'; -- REDHIANA LANGEN TRESNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01496/022/800/2019' WHERE `cnip` = '196406021990021001'; -- SUMARNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10264/185/813/2020' WHERE `cnip` = '199401222019031010'; -- AULIA RAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10256/185/144/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198912102019032017'; -- Desi Anggrayani
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01444/191/693/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408152019032011'; -- IKA ARIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01784/001/190/2017' WHERE `cnip` = '198208122010011009'; -- IKHSAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10241/185/898/2020' WHERE `cnip` = '198810102019031023'; -- ISMUNANDAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10285/185/716/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198602102010031001'; -- KHALIL LULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10306/185/140/2020' WHERE `cnip` = '197812122012122002'; -- MARDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10294/185/646/2020', `cnopnt` = NULL, `cnosnt` = 'BNT-10294/185/646/2020' WHERE `cnip` = '198204022006041005'; -- MUAZMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10237/185/843/2020' WHERE `cnip` = '199211052019031011'; -- MUNIR FUADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10258/185/756/2020' WHERE `cnip` = '199212302019032025'; -- NANDA KHALISA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02842/185/796/2018' WHERE `cnip` = '198304202006041016'; -- RAHMAT TASLIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08972/087/316/2022', `cnosnt` = NULL WHERE `cnip` = '198708192009122006'; -- ASRI FIKA AGUSTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00032/088/955/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198609152009122006'; -- ELIH ERMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00033/088/336/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198009062008121004'; -- LUKMAN HAKIM
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '196411031992032001'; -- NORSANTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00004494/121/3005/114/2024' WHERE `cnip` = '198111262008121001'; -- NOVIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08923/185/672/2020' WHERE `cnip` = '197101162005012001'; -- YAN MEDYA PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04124/185/211/2018' WHERE `cnip` = '197609282001121001'; -- ASEP SULAEMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04902/087/475/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198112202006041002'; -- AULIA ISKANDARSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04150/185/520/2018' WHERE `cnip` = '197301312007012001'; -- BETI BUANAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04125/185/342/2018' WHERE `cnip` = '197512072008101001'; -- DIKI FATHURAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09459/022/647/2018' WHERE `cnip` = '197310052007102001'; -- DINI NURHAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04126/185/443/2018' WHERE `cnip` = '197111041994031001'; -- DJINO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198807112014041001'; -- AGUNG DARMAWAN DWIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08581/185/512/2020' WHERE `cnip` = '197810272009121002'; -- AHMAD SUTIKNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01967/185/213/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199604032019032007'; -- APRIAS NINDI SAPUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0884/2.2.0.0.1/03/03/2011', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197702112008011007'; -- ARIEF SANJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00042/191/626/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198204202008121005'; -- BUDI HARIN PRASETIYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04343/185/344/2021' WHERE `cnip` = '199305062019031014'; -- DADI HANDOYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnosnt` = 'BNT-01493/191/487/2022' WHERE `cnip` = '199404072019032015'; -- HESIH PERMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0870/2.2.0.0.1/03/00/2012', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198607042009121005'; -- IRVAN YULIASTONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02230/185/807/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197405012005011002'; -- JOBIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04737/185/501/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198706132010122009'; -- JOSEPHINE MARGARETTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04738/185/532/2017' WHERE `cnip` = '196209171984031010'; -- LALANG SAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02678/175/343/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198904112010121007'; -- MUHAMMAD ZAINI DAHLAN AL-ASY`ARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05613/191/455/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198403182010122002'; -- NENENG CHAIRUNISA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06759/185/857/2020' WHERE `cnip` = '198604192015042005'; -- NIDYA ARIESANDY BUDIHADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06348/185/651/2020', `cnosnt` = '-' WHERE `cnip` = '198505082010122003'; -- N NURMALA FAUJAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10930/191/353/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198310102014092002'; -- NURIKHANA SETIASIH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00036494/121/3005/114/2022' WHERE `cnip` = '198305122009122005'; -- PENINA RENTA MARIA GULTOM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04740/185/995/2017' WHERE `cnip` = '196408291984032001'; -- RETNO HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04374/185/698/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199402102019032017'; -- RIEKANANDA MEGA SAFIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04782/185/991/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198504022015042002'; -- RINA KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06357/185/191/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197607292010122001'; -- RUSSY ARUMSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09129/185/901/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198809042014042001'; -- SITI ISPRIYASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06340/185/503/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196807311993031001'; -- SUHENDRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06806/185/000/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408192009122002'; -- SYIFA MUFIEDATUSSALAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00010533/121/3005/114/2023', `cnosnt` = NULL WHERE `cnip` = '198602102014042001'; -- TRI KUSUMASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06070/185/123/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196711062014092001'; -- TRI SUMARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00058784/121/3005/114/2022' WHERE `cnip` = '198010182008121001'; -- WALUYO BASUKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '032100556057185', `cnosnt` = NULL WHERE `cnip` = '198203052008121003'; -- YOGA DWI ARIANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12814/128/316/2018' WHERE `cnip` = '196610191990011002'; -- AA SUHERLAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05002/191/917/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198501052005012002'; -- ADE KRISMAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11129/191/114/2024', `dtgltbnt` = '2025-01-02', `dtglkbnt` = '2030-01-02', `cnopnt` = NULL, `cnosnt` = 'SNT-04078/087/119/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-01-02', `dtglkadaluarsa` = '2030-01-02' WHERE `cnip` = '199702122018121003'; -- AGUNG PRIH ADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01333/054/210/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198602062009111001'; -- AHMAD MISWAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-19804/054/712/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '198312302015041002'; -- AL AZHAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-01607/030/014/2025' WHERE `cnip` = '197409192002122001'; -- AMBAR WAHYU ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02313/022/919/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197812012002122003'; -- ANNE GREANNE BARNIS SAGITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-16739/054/316/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197901152003121004'; -- ANSHARI MAREWA, AMK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01944/032/118/2021', `cnosnt` = NULL WHERE `cnip` = '197305061994121001'; -- ANWAR SIDARTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00830/125/311/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `cnopnt` = NULL, `cnosnt` = 'SNT-07701/125/315/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '197903042010121004'; -- ARIEF ISRUMAHENDRA PRASETYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-19539/125/517/2025', `cnosnt` = NULL WHERE `cnip` = '197112042001121001'; -- ARIEF SATRIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11131/191/317/2024', `dtgltbnt` = '2025-01-02', `dtglkbnt` = '2030-01-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-01-02', `dtglkadaluarsa` = '2030-01-02' WHERE `cnip` = '198501092015041001'; -- ARIE KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03928/185/412/2018', `cnopnt` = 'PNT-01087/087/416/2024', `cnosnt` = NULL WHERE `cnip` = '197707302006042001'; -- ATIK RIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01680/191/025/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198503222010122003'; -- BUDIARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06666/128/294/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197211112001122001'; -- BUDIARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09097/185/835/2020' WHERE `cnip` = '198206112010121005'; -- CAHYA PURNAMA PUTERA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04379/087/833/2024', `cnosnt` = NULL WHERE `cnip` = '198309262009121005'; -- CECEP SOMANTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11162/191/041/2024', `dtgltbnt` = '2025-01-02', `dtglkbnt` = '2030-01-02', `cnopnt` = 'PNT-02142/087/049/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-01-02', `dtglkadaluarsa` = '2030-01-02' WHERE `cnip` = '198009032006041001'; -- DARU CONDRO PRANOTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '198407302010122004'; -- Deis Savitri Artisheila, SE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03139/185/446/2017' WHERE `cnip` = '198707112015041003'; -- DENY SETYAWAN PURWANDARU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08480/185/740/2018' WHERE `cnip` = '197310152003122001'; -- DEWI BUNDA SINTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02685/185/201/2017' WHERE `cnip` = '196401011989022001'; -- DJUMARYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '196702061993032001'; -- Dra. Sawitri Isnandari
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00456/191/445/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197310301994032002'; -- DWI HARTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07282/087/259/2022', `dtgltpnt` = '2022-09-05', `dtglkpnt` = '2027-09-05', `cnosnt` = NULL, `dtglsertifikat` = '2022-09-05', `dtglkadaluarsa` = '2027-09-05' WHERE `cnip` = '197909162005011003'; -- EDY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11227/179/853/2024', `dtgltpnt` = '2024-12-31', `dtglkpnt` = '2029-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2024-12-31', `dtglkadaluarsa` = '2029-12-31' WHERE `cnip` = '197504202006041003'; -- EKO BUDIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08970/185/054/2020', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '197612222014091002'; -- EKO SURANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11086/185/356/2019' WHERE `cnip` = '197309132002121001'; -- ENDRI HANDONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01239/032/055/2016' WHERE `cnip` = '196708092006042005'; -- ENY SETYORINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01018/191/350/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196906111989122001'; -- ERPIN JUNIATI NABABAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07471/087/059/2022' WHERE `cnip` = '197001112000031001'; -- ERU ACHMAD SUTAMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03933/185/858/2018' WHERE `cnip` = '198104052008101001'; -- ERWAN SUBAKTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-11621/032/351/2024' WHERE `cnip` = '197509202006042001'; -- ESTININGSIH BUDI LESTARI, S.E, M.M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02143/440/550/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = 'SNT-06663/087/551/2022', `dtgltsnt` = '2022-08-10', `dtglksnt` = '2027-08-10', `dtglsertifikat` = '2022-08-10', `dtglkadaluarsa` = '2027-08-10' WHERE `cnip` = '197701192000122001'; -- ETTY PURWATININGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00029/191/751/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197208281994012001'; -- Euis Nuruliah
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03899/185/159/2018', `cnopnt` = 'PNT-08548/136/155/2024', `dtgltpnt` = '2024-09-30', `dtglkpnt` = '2029-09-30', `cnosnt` = NULL, `dtglsertifikat` = '2024-09-30', `dtglkadaluarsa` = '2029-09-30' WHERE `cnip` = '198305142006042002'; -- EVA KOMALASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02707/191/366/2024' WHERE `cnip` = '198509012015042002'; -- FARADIELLA HASVARY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11160/191/069/2024', `dtgltbnt` = '2025-01-02', `dtglkbnt` = '2030-01-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-01-02', `dtglkadaluarsa` = '2030-01-02' WHERE `cnip` = '198802202010122006'; -- FEBRIANI DYAS UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03370/191/963/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198702022019022005'; -- FRIDA UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01333/185/880/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199606072019032009'; -- Hafidhyah Dwi Wahyuna
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03146/185/384/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408122005011001'; -- HANDOKO PAMUNGKAS
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04181/019/384/2024' WHERE `cnip` = '199205072019021004'; -- HARY PURWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01746/191/888/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197011271993032001'; -- HENY SULISTYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06739/087/185/2022', `cnosnt` = NULL WHERE `cnip` = '197704302001121001'; -- HERI SUTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11192/191/784/2024', `dtgltbnt` = '2025-01-02', `dtglkbnt` = '2030-01-02', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-01-02', `dtglkadaluarsa` = '2030-01-02' WHERE `cnip` = '197504012005011002'; -- HERMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04330/185/380/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198804032019021003'; -- HERU ARIWIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02740/185/783/2017' WHERE `cnip` = '198007202006042002'; -- HIDAYATUNNISMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '196906201992031006'; -- I GUSTI MADE ARDANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08216/440/747/2026', `dtgltpnt` = '2026-07-03', `dtglkpnt` = '2031-07-03', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-03', `dtglkadaluarsa` = '2031-07-03' WHERE `cnip` = '197607162005011001'; -- IIP ICHSANUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08689/087/491/2023' WHERE `cnip` = '198207252009101001'; -- IMAM SUYUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05614/191/396/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198403082015042001'; -- INA WAHYUNARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08113/185/893/2018' WHERE `cnip` = '198105042006041004'; -- INDRA ISMAIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08762/191/093/2023', `cnopnt` = NULL, `cnosnt` = 'SNT-04773/022/091/2026', `dtgltsnt` = '2026-07-24', `dtglksnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197308112001121001'; -- ISNEIN RAJAB HANAFIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09536/054/803/2018' WHERE `cnip` = '197906242005011002'; -- JAMALUDDIN TANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07060/185/83/2018' WHERE `cnip` = '198001092006041010'; -- JANUAR BENTHONI THAMRIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11198/191/810/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198909202014042001'; -- JINGGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03182/185/404/2017' WHERE `cnip` = '197012042002121001'; -- JUGIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00293/088/104/2018' WHERE `cnip` = '197607292009122001'; -- JULIANA LUBIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02789/185/116/2017' WHERE `cnip` = '197809252001121003'; -- KHUMAIDI USMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03431/185/711/2018' WHERE `cnip` = '197203231998032001'; -- KOENI PUDYASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '197706292010121001'; -- Kristiantoro Nurwahyono, SE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02479/440/832/2026' WHERE `cnip` = '197901012005012003'; -- LINA YANUARTI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-26946/121/3005/114/2022' WHERE `cnip` = '198701182015042002'; -- LUGINA AULYA ZAMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02813/191/944/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197803292010122001'; -- MARETTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02102/185/145/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196705031990012001'; -- MAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06538/128/442/2018' WHERE `cnip` = '196312021988031001'; -- MUGIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04431/185/742/2021', `dtgltbnt` = '2021-10-01', `dtglkbnt` = '2026-10-01', `cnopnt` = 'PNT-11815/054/746/2021', `dtgltpnt` = '2021-12-28', `dtglkpnt` = '2026-12-28', `cnosnt` = 'SNT-11189/054/740/2021', `dtgltsnt` = '2021-12-14', `dtglksnt` = '2026-12-14', `dtglsertifikat` = '2021-12-28', `dtglkadaluarsa` = '2026-12-28' WHERE `cnip` = '198403202015041002'; -- MUHAMMAD SUFI ZULKARNAEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03918/185/841/2018' WHERE `cnip` = '198210162010122002'; -- MURNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'SKP-00124/2.3.1.2.058.R/03/03/20', `cnosnt` = NULL WHERE `cnip` = '197312072002121001'; -- NANA HALIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00127/191/050/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-04-10', `dtglkadaluarsa` = '2030-04-10' WHERE `cnip` = '199604012019021001'; -- NANDA FUJA DARMAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10604/054/851/2018' WHERE `cnip` = '198001182005011004'; -- NAZARUDDIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08673/004/354/2022', `dtgltpnt` = '2022-09-30', `dtglkpnt` = '2027-09-30', `dtglsertifikat` = '2022-09-30', `dtglkadaluarsa` = '2027-09-30' WHERE `cnip` = '197004201989121001'; -- NELSON MANURUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '01KCGV7C8GKKXMWB8TM4ASN5KS', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197002031992032002'; -- NIRMAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07334/030/617/2019', `cnopnt` = NULL WHERE `cnip` = '197608232008122001'; -- ARSITA ARDIAMURTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07339/030/802/2019' WHERE `cnip` = '198706252009122006'; -- JENGGER WORO HAPSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04582/191/739/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198912162015042003'; -- LATIFA AINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07340/030/844/2019', `cnopnt` = NULL WHERE `cnip` = '198906232010121005'; -- MUHAMMAD IQBAL FAUZI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02960/185/657/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408132015042001'; -- EFRIDAYANTI NASUTION
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00286/004/558/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197708032008122002'; -- ENDANG KEMALASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10239/185/975/2020' WHERE `cnip` = '198910292019031008'; -- GUNUNG NASUTION
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00298/004/140/2016' WHERE `cnip` = '198406032009121003'; -- MUHAMMAD YAMANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02372/004/574/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198604072010122002'; -- PUJI RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04549/185/672/2020' WHERE `cnip` = '198709112011012014'; -- PUTRI WIDYASTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10289/185/800/2020' WHERE `cnip` = '198402222006042007'; -- SHANTI MANDASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00682/004/806/2016' WHERE `cnip` = '197806162009121003'; -- SUHENDRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00287/004/009/2016' WHERE `cnip` = '197403152010121001'; -- SUYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01877/004/503/2017' WHERE `cnip` = '196312121989121001'; -- SYAMSUL BAHRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00147/004/848/2016' WHERE `cnip` = '198406192010122006'; -- VINA WINDA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '051305723921946', `cnosnt` = NULL WHERE `cnip` = '198306222008122002'; -- ZUNAIRA IMATAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06271/014/746/2018' WHERE `cnip` = '198312222009122004'; -- DESSY SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02155/188/243/2019' WHERE `cnip` = '198810232015041002'; -- M MINTAREZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00057/022/812/2020' WHERE `cnip` = '197705272009121003'; -- AZHI MAULANA YUSUP
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00273/022/332/2020' WHERE `cnip` = '196406161989031005'; -- CANDRA PURNOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00106/022/637/2020' WHERE `cnip` = '196609141990032001'; -- CUCU JUHAENAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05618/191/050/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199107212009122001'; -- ELFA YULIATRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00160/010/557/2018' WHERE `cnip` = '197009181992032001'; -- ELVIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00080/022/878/2020' WHERE `cnip` = '198301242008121005'; -- PATU ROCHMAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198104082009121004'; -- SYAHRIR LUBIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '061329620925232', `cnosnt` = NULL WHERE `cnip` = '198510152008121001'; -- GUNAWAN WICAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '0108/2.3.1.2.271/03/00/2018', `cnosnt` = NULL WHERE `cnip` = '198304282015041002'; -- GUSTI HIDAYAT NOOR GUSDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01386/045/048/2017', `cnosnt` = NULL WHERE `cnip` = '198902012010121005'; -- MUHAMMAD MUSLIM ASYARI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08564/045/153/2021' WHERE `cnip` = '197002021993031001'; -- NAZIB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00860/191/454/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198901242010122004'; -- NINA MAHDIANA NOOR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00836/045/197/2016' WHERE `cnip` = '198204072015042002'; -- REZKI AMELIA NOOR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00837/045/798/2016' WHERE `cnip` = '199104212015042002'; -- RIZKA FITRIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10057/037/553/2019' WHERE `cnip` = '197606062005012002'; -- HERLINAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02228/054/304/2017', `cnopnt` = NULL, `cnosnt` = 'SNT-07105/054/313/2022' WHERE `cnip` = '198601262009122008'; -- JANUAR LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09844/054/745/2018' WHERE `cnip` = '198007112010121005'; -- MUH. ALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03747/185/951/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198701302010122004'; -- NAMIRAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02225/054/901/2017', `cnopnt` = NULL, `cnosnt` = 'SNT-03217/054/903/2023' WHERE `cnip` = '198508082009122008'; -- SUKMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01369/054/309/2023', `cnosnt` = NULL WHERE `cnip` = '196812151993031004'; -- SYAHRUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00289/017/611/2016' WHERE `cnip` = '198608132012122002'; -- AJENG ELIYANA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10475/017/617/2022' WHERE `cnip` = '199205282019031015'; -- ALI MUHTAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10613/017/911/2022' WHERE `cnip` = '198703012012121002'; -- ARIF ROHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04908/191/641/2022' WHERE `cnip` = '199309052020121013'; -- DHENI SAPUTRA.JP
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-05461/017/956/2022' WHERE `cnip` = '197511231999031004'; -- EKO FERI KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03643/185/056/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198706272019032014'; -- ERICCA WIDIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08920/185/399/2020' WHERE `cnip` = '198406142006041003'; -- IWAN MARYAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00178/185/646/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199403282019031020'; -- M. NANDA IDRIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05628/191/841/2022' WHERE `cnip` = '199501032019031014'; -- M RIZKY RIDWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '04929/191/594/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199011132019031017'; -- RENDI RIA DARMAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08533/185/109/2018' WHERE `cnip` = '198207132008021003'; -- SAMSUL BAHRI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-10668/017/101/2022' WHERE `cnip` = '198802032019031008'; -- SYAIKHUL AZIZ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12208/190/343/2018' WHERE `cnip` = '198912032015042002'; -- DEATI ANITA WIDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02286/026/888/2017', `cnosnt` = NULL WHERE `cnip` = '197512122008122003'; -- HERAWATY TETTY SUDARMINTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02288/026/750/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198311132010122002'; -- NOFALINA YODIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02287/026/129/2017' WHERE `cnip` = '196407041983031002'; -- TRIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01769/031/643/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198703262015041003'; -- DHIDIT PRASETYA ADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02089/190/569/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198609022015042003'; -- FARIDA ULFAYATIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00451/031/670/2016' WHERE `cnip` = '196401141989021001'; -- PURNOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03313/185/590/2020', `cnopnt` = 'PNT-11020/031/554/2022', `cnosnt` = NULL WHERE `cnip` = '198406252008121002'; -- RADEN ERDIANTO SETYO WAHYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04233/031/692/2019', `cnopnt` = NULL, `cnosnt` = 'SNT-11021/031/695/2022' WHERE `cnip` = '198503192009122003'; -- RATNA DWI ANGGARWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06661/037/839/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198907132010122005'; -- COKORDA ISTRI DEWI PRIMAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06898/185/891/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198205302009121004'; -- I GUSTI MADE NGURAH MEIADA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06905/185/630/2019' WHERE `cnip` = '197603282015042001'; -- LUH GEDE EKA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06663/037/841/2019' WHERE `cnip` = '198607072010122006'; -- MADE YULLY MARTIANA DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06410/191/031/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198608082009122003'; -- CORY MASYITHAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00195/010/865/2018' WHERE `cnip` = '196702121992031001'; -- FIKRI RUSLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00224/010/688/2018' WHERE `cnip` = '196909021992031001'; -- HENDRI WANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01886/185/143/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199502052019032020'; -- MARITSA FEBRA GEMAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06424/191/146/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196802232007012001'; -- MURNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06440/191/164/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198905182015041003'; -- ORI ADRIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02054/010/791/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198209262008122002'; -- RAHMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '06450/191/795/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197712282010122002'; -- RATNA JIMMI LASMINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06468/191/904/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198803282019032015'; -- SETRIAMELA MARISSA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01237/010/353/2016', `cnopnt` = NULL WHERE `cnip` = '198109142010121003'; -- WANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02036/010/471/2017' WHERE `cnip` = '198107262010121002'; -- YOFAN HAMASKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06616/061/939/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198008122010122002'; -- CHRISTINA PONGALLO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09445/061/442/2021' WHERE `cnip` = '196702271994031002'; -- ISAK HENDRIK SINAY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09537/061/804/2018', `cnosnt` = NULL WHERE `cnip` = '198404202010122003'; -- JOLANDA PATTIRUHU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00261/061/433/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198301022008122002'; -- LEDY JEANE LILINE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08930/185/940/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198905252019032024'; -- MAYLONA SIADARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09455/061/843/2021' WHERE `cnip` = '197909122009122004'; -- MELDA WASSAHUA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09737/061/606/2022' WHERE `cnip` = '198609302010121007'; -- STEVY MONIHARAPON
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-11781/001/518/2021' WHERE `cnip` = '198106282005011005'; -- JULFIKAR
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-11780/001/107/2021' WHERE `cnip` = '197001032006041003'; -- SYAFI`I
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07541/193/517/2019' WHERE `cnip` = '197405182014091001'; -- ANDI ISWANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07131/185/112/2019' WHERE `cnip` = '197309202007012001'; -- ANIK RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06986/193/919/2018' WHERE `cnip` = '197412312007101002'; -- ARIF WICAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04738/185/712/2018' WHERE `cnip` = '198301052014042002'; -- ARI MAULIDINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04739/185/213/2018' WHERE `cnip` = '196511181987012001'; -- ARMITA EKO WATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07544/193/410/2019' WHERE `cnip` = '198603252014041001'; -- A TAUFANI IRAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04740/185/445/2018' WHERE `cnip` = '198004202009102001'; -- DIMA VICI NADIA ARIEFIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04741/185/546/2018' WHERE `cnip` = '198102132007101001'; -- DWI SUSILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04742/185/447/2018' WHERE `cnip` = '198209142010122001'; -- DYAH TRIAJENG PAMUNGKAS PUTU RAHARJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04247/032/867/2019' WHERE `cnip` = '197808052010121003'; -- FANI LEONARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04743/185/268/2018' WHERE `cnip` = '197704132007012001'; -- FARIDA ARIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04744/185/369/2018' WHERE `cnip` = '198102022009122002'; -- FITRIA PUJI HARMINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04745/185/070/2018' WHERE `cnip` = '196710061987011001'; -- GEMBONG WIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04746/185/281/2018' WHERE `cnip` = '197010312007011001'; -- HADI SUKARNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04747/185/482/2018' WHERE `cnip` = '196901082005011001'; -- HERI EKO PURWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06988/193/481/2018' WHERE `cnip` = '198106182014092005'; -- HIDAYATUL KHOIRIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07987/185/391/2020' WHERE `cnip` = '197707022001122001'; -- INDARTI ADININGGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07124/185/494/2019' WHERE `cnip` = '197706222005012008'; -- INDRA HAYATI ROFI `AH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04749/185/614/2018' WHERE `cnip` = '197406181999032002'; -- KRISTINA HESTININGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08845/185/615/2018' WHERE `cnip` = '198308252014091001'; -- KUSTRIAMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06990/193/434/2018' WHERE `cnip` = '198504252005012001'; -- LUSY FINA TURSIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04751/185/547/2018' WHERE `cnip` = '198803062014042001'; -- MEGA ANASTASIA WIDYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10182/032/642/2018' WHERE `cnip` = '197707052007011002'; -- MUHAMMAD AMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04752/185/848/2018' WHERE `cnip` = '198206202008101001'; -- MUSLIMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04753/185/359/2018' WHERE `cnip` = '198601082010121003'; -- NANDHIKA GATAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04754/185/750/2018' WHERE `cnip` = '197907312008102002'; -- NUR CHOLISAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07545/193/751/2019' WHERE `cnip` = '198312212014092003'; -- NURIBUT SETYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04755/185/161/2018' WHERE `cnip` = '196601262007012001'; -- ONNY YANUARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08846/185/576/2018' WHERE `cnip` = '197906032014092004'; -- PARAMITA DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10179/032/378/2018' WHERE `cnip` = '198308132008102001'; -- PUTRI SWASTIKA SUKMANASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07543/193/299/2019' WHERE `cnip` = '197801242008102001'; -- RADEN RORO DEVITA NIRMALA HAPSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04756/185/192/2018' WHERE `cnip` = '197810052010122001'; -- RARA ADITI INANDRICIYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-04214/429/811/2021' WHERE `cnip` = '197502042006052002'; -- JANE SHIRLEY WAMBRAUW
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01495/185/499/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199607022019032014'; -- RIZKI ROHANA PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09398/064/529/2019' WHERE `cnip` = '198609202015042001'; -- THINA FELMA JOSEPHIN ANSEK
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '197908172005012002'; -- ERNA ANGRENI MANUAIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04095/185/548/2018' WHERE `cnip` = '197506072005011002'; -- MIKAEL AMBAR WALY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09078/185/394/2020' WHERE `cnip` = '197407232003122001'; -- ROS HAYATI ROSNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02703/185/912/2019' WHERE `cnip` = '198608252009122008'; -- AISYAH PUTRI RIZKIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04123/185/110/2018' WHERE `cnip` = '198212262008011012'; -- ANDI SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07127/185/117/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198908152014042001'; -- ANISA RIZKYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08129/185/610/2020' WHERE `cnip` = '198702182009121008'; -- ARI SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197903312005011002'; -- CIPTO SUBROTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '198705142011012025'; -- DIAH FITRI ANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07978/185/551/2020' WHERE `cnip` = '197609302008102001'; -- EKA PUJIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08014/185/453/2020' WHERE `cnip` = '197909092008101001'; -- EKO SEPTIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197509132009102001'; -- ENIE KUSSETIYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04153/185/053/2018' WHERE `cnip` = '197608182014092001'; -- ENTI WAHYUNINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07976/185/859/2020' WHERE `cnip` = '197609062007012001'; -- EVI KUSAESI ARIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04129/185/666/2018' WHERE `cnip` = '198006202009121004'; -- FARID HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197202222000031001'; -- GATHOT HERI SUDIBYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08025/185/685/2020' WHERE `cnip` = '198009182008102001'; -- HARDIYATMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07935/185/494/2020' WHERE `cnip` = '197202212005012001'; -- INDRAWATI WAHYUNINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02715/185/195/2019' WHERE `cnip` = '198703032009122001'; -- IRA RACHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01236/029/292/2017', `cnosnt` = 'SNT-06390/029/298/2021' WHERE `cnip` = '198605212008012001'; -- IRMA INDRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00029/029/491/2016', `cnopnt` = NULL WHERE `cnip` = '197510012006041001'; -- IWAN SUBONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08119/185/919/2020' WHERE `cnip` = '198606092010122010'; -- KHUSNUL KHOWATIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08031/185/412/2020' WHERE `cnip` = '198101222009121004'; -- KURNIA ARISETYAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04131/185/919/2018' WHERE `cnip` = '197112172007012002'; -- KUSRINI KARTIKAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02840/185/044/2018' WHERE `cnip` = '197803022008101003'; -- MARSUDI WIDODO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07959/185/250/2020' WHERE `cnip` = '197503102007102001'; -- NUNING JATI NINGSIH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '09496/099/718/2022' WHERE `cnip` = '199002242019031007'; -- AGUNG NURSABILILLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02099/190/310/2019' WHERE `cnip` = '198906282015042004'; -- ANGGRIA DWI SILVANA HARIYATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '09471/099/841/2022' WHERE `cnip` = '198311052015041001'; -- DEVIT SUWARDIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06442/100/896/2018' WHERE `cnip` = '198605182014042001'; -- IMAROTUL HUSNA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '09497//099/949/2022' WHERE `cnip` = '198403312019031007'; -- MIRZA GHULAM RIFQI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02720/185/871/2019' WHERE `cnip` = '198611022014041001'; -- PRIO WIDHIA FAJAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09130/185/803/2018' WHERE `cnip` = '198103152015041001'; -- SOFYAN HADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07646/100/253/2018', `cnosnt` = 'SNT-0151/099/256/2021' WHERE `cnip` = '198307132010122003'; -- WAHYU YULIANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01458/100/978/2019' WHERE `cnip` = '199008202014042001'; -- YANI AGISTIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08271/185/828/2020' WHERE `cnip` = '196806261994121002'; -- BOWO KRISWANTO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-10932/015/695/2022' WHERE `cnip` = '197604182014041001'; -- IRWAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02423/015/441/2020', `cnosnt` = NULL WHERE `cnip` = '197512182014041001'; -- MUHAMMAD SUBHAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-1076/015/654/2022' WHERE `cnip` = '198604082014041001'; -- NANDA PRANANDITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05181/185/205/2020' WHERE `cnip` = '198909152019032020'; -- STEFFINNA PRECELIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02155/015/653/2018', `cnopnt` = 'PNT-01361/015/651/2023' WHERE `cnip` = '198501022015042003'; -- WAHYUNI ANGGRAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00677/012/110/2016' WHERE `cnip` = '198403062008011002'; -- AHMAD NUR BUDI UTAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04121/185/818/2018', `cnopnt` = 'PNT-00998/012/816/2020' WHERE `cnip` = '198511212009121009'; -- AHMED RIZA FAHLEVI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09117/012/528/2021' WHERE `cnip` = '196708041992031002'; -- BAHRIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08035/185/046/2020' WHERE `cnip` = '198105062009121004'; -- DEDY SABARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12193/187/946/2018' WHERE `cnip` = '199005232015042004'; -- DIRA MEILINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09012/185/842/2018', `cnopnt` = 'PNT-09109/012/849/2021' WHERE `cnip` = '198805072015042004'; -- DWIANA SUHARTI ITO HARAHAP
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00863/012/267/2020' WHERE `cnip` = '197811232008011002'; -- FADLI IMAN SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12203/187/088/2018' WHERE `cnip` = '198611042015042001'; -- HUMAIROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08532/185/598/2018' WHERE `cnip` = '198202122015042001'; -- INDRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09016/185/996/2018', `cnopnt` = 'PNT-09124/012/996/2021', `cnosnt` = NULL WHERE `cnip` = '198901012014042002'; -- INTAN PUTRI KUSUMATHIAS
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00614/012/821/2020' WHERE `cnip` = '196611132000031001'; -- KHAIDIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09121/185/013/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198202172015042001'; -- KUSTATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09122/185/044/2018' WHERE `cnip` = '198107132015042002'; -- MARDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09448/012/445/2019' WHERE `cnip` = '198403182009102002'; -- MARLINDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01725/012/345/2020' WHERE `cnip` = '196808102007012001'; -- MARYANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00715/012/743/2022' WHERE `cnip` = '198301052015042001'; -- MULIYATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00619/012/156/2020' WHERE `cnip` = '197906182005012001'; -- NYIMAS MARIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01717/012/396/2020' WHERE `cnip` = '198407042006042002'; -- RATIH FITRI SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00640/012/600/2016', `cnopnt` = 'PNT-00619/012/156/2020' WHERE `cnip` = '197510032006041002'; -- SAMSUL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01721/012/701/2020' WHERE `cnip` = '199102052014041001'; -- SATRIA FEBRIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00360/012/509/2017', `cnopnt` = 'PNT-08987/012/502/2021', `cnosnt` = 'SNT-09108/012/508/2021' WHERE `cnip` = '198612082006042001'; -- SUCI PERMAISARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00996/012/204/2020' WHERE `cnip` = '197106262002121002'; -- SUGENG WAHYUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01702/012/700/2020' WHERE `cnip` = '197005052007012001'; -- SUPRIHATIN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09100/012/750/2021' WHERE `cnip` = '196509251989032002'; -- WIWIK DIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07346/185/740/2020' WHERE `cnip` = '198905232010122001'; -- DINA SYAHFITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08942/185/463/2020' WHERE `cnip` = '199110212019031016'; -- FANDINATA AMRIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09182/190/840/2018' WHERE `cnip` = '196805091991032001'; -- MARY ERWANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08941/185/752/2020' WHERE `cnip` = '199104212019032025'; -- NI LUH PUTU MUSTIKA PRAPTIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09077/185/293/2020' WHERE `cnip` = '199410262019031009'; -- RASSEL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00447/088/495/2018' WHERE `cnip` = '198604152010122004'; -- RATIH ANDI KUMALANINGATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06115/185/793/2020' WHERE `cnip` = '196605281992032002'; -- RITA TATIK SUPRAPTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04162/185/503/2018' WHERE `cnip` = '197405091993032001'; -- SRI UTAMI SETYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04163/185/504/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196901091991031001'; -- SUGIARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04138/185/806/2018' WHERE `cnip` = '197101181992032001'; -- SURYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02848/185/402/2018' WHERE `cnip` = '197309231993032001'; -- SURYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08963/185/906/2020' WHERE `cnip` = '198712012019032006'; -- SUSWINARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06301/185/100/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197107061992031001'; -- SUYOTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06262/185/836/2020' WHERE `cnip` = '197102171993032001'; -- UMI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04141/185/430/2018' WHERE `cnip` = '196907201992032001'; -- UMI YULIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04745/185/750/2017' WHERE `cnip` = '198406092010122002'; -- WIKE WIJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04762/185/219/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197410282001121001'; -- AGUNG PRASETYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02586/036/811/2020', `cnosnt` = NULL WHERE `cnip` = '197603022002121002'; -- AKH LUTFI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03453/036/815/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198304122006042002'; -- ALVI NUR IZZAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02570/036/514/2020', `cnosnt` = NULL WHERE `cnip` = '198109252006041001'; -- AMRIN RAZALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04399/185/815/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198503022010122003'; -- ANGGRAENI HESTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03301/185/917/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198105012006042001'; -- ANISAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00463/036/413/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197802252006041001'; -- ARIF MAULANA NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02103/190/416/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197906202006041001'; -- ARIS FERIANTO YUNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02531/036/021/2020', `cnosnt` = NULL WHERE `cnip` = '197806092005011001'; -- BUDI JAYA SUGIARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-2560/036/753/2020', `cnosnt` = NULL WHERE `cnip` = '197611202001121001'; -- EDY SUPRAPTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09722/036/080/2022', `cnosnt` = NULL WHERE `cnip` = '197609262006042001'; -- HARI INDAH WAHYUNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02095/190/786/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197705262006042001'; -- HARUMI BERLIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03111/036/986/2022', `cnosnt` = NULL WHERE `cnip` = '198602122010122004'; -- HERLIN DIAH LESTARY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03110/036/095/2022', `cnosnt` = NULL WHERE `cnip` = '197611142006042001'; -- INTAN PRATIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03663/185/598/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197708122001122001'; -- ITA KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05103/087/829/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197404122002121001'; -- KHOIRUL ROSYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03422/185/431/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196507242001122001'; -- LILIS WIJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04827/185/141/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197709082006041001'; -- MOHAMMAD SHALEH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00745/036/946/2017' WHERE `cnip` = '197911012008121001'; -- MOH. SUKUR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03098/036/340/2022', `cnosnt` = NULL WHERE `cnip` = '197706302001121004'; -- MUDASSIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02574/036/658/2020', `cnosnt` = NULL WHERE `cnip` = '196503202001121001'; -- NINGWAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04226/185/254/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198007162006042002'; -- NINIK KUSTIANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02092/190/353/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110302006042002'; -- NOOR INDAH UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02628/036/878/2020', `cnosnt` = NULL WHERE `cnip` = '197806072006041003'; -- PRASETYO NUGROHO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02091/190/202/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198007162008011009'; -- SIGIT CAHYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09704/036/300/2022', `cnosnt` = NULL WHERE `cnip` = '197703152003122001'; -- SITI FADILAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02105/190/508/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198712162014042001'; -- SITI MUKARROMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04470/185/305/2020', `cnopnt` = 'BNT-04470/185/305/2020', `cnosnt` = NULL WHERE `cnip` = '197202022005012002'; -- SUMIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06838/036/675/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198007292008012022'; -- YULI ASTUTIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03764/185/270/2020' WHERE `cnip` = '197606212001122001'; -- YUNI WIDYASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02626/036/686/2020', `cnosnt` = NULL WHERE `cnip` = '197610202001121001'; -- ZAINI FADLUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01257/031/615/2016' WHERE `cnip` = '197602012010121005'; -- AGUNG ARIESTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07133/185/814/2019' WHERE `cnip` = '198106212005012002'; -- ANDRI  YANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00566/031/717/2017' WHERE `cnip` = '198303212006041002'; -- ANTON SUJARWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01253/031/681/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197811182009122003'; -- HAIDAR ROSSYDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04164/087/395/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197508032000031001'; -- I GUSTI AGUNG KETUT SATRYA WIBAWA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01756/131/419/2017' WHERE `cnip` = '197010152000031002'; -- AGUS MULYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01896/131/814/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110262008101001'; -- ARIEF YUNARKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03609/414/548/2021', `cnosnt` = NULL WHERE `cnip` = '196312121990031002'; -- BAMBANG MARHAENANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03605/414/124/2021', `cnosnt` = NULL WHERE `cnip` = '198206232005011002'; -- BAYU DWI ANGGONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01904/131/924/2020' WHERE `cnip` = '197109282007011010'; -- Bibit Hariyanto
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01908/131/838/2018' WHERE `cnip` = '197701122008101001'; -- CEPLUK SUPRIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01911/131/442/2018' WHERE `cnip` = '198004022005022006'; -- DIAN KUSUMA NINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00824/131/344/2019' WHERE `cnip` = '197910152009101002'; -- DIDIK WIJIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01902/131/652/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196611112005012001'; -- EKA YUSTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08321/191/554/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198104202009102002'; -- ELIA MUSROFA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00826/131/256/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198012102008102001'; -- ELOK ZAKIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01889/131/156/2020' WHERE `cnip` = '196706022010012001'; -- ESTI MARINGPRIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01905/131/565/2020' WHERE `cnip` = '196705252001122001'; -- FARIDA ERLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03820/414/863/2021', `cnosnt` = NULL WHERE `cnip` = '198010092005012002'; -- FARIDA WAHYU NINGTYIAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01920/131/062/2018' WHERE `cnip` = '198603302010122006'; -- FIDA LAILU FAJRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01898/131/386/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198107252001121002'; -- HADI HARIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01907/131/187/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197904102005011002'; -- HERMAWAN YUDI ARISANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01899/131/587/2020' WHERE `cnip` = '197603092001122001'; -- HILDA NURAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00823/131/103/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196608112005011002'; -- JUMARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03667/414/332/2021', `cnosnt` = NULL WHERE `cnip` = '197803232005012002'; -- LANTIN SULISTYORINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01758/131/941/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197405032007011002'; -- MUHAMMAD RIFA`I
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02707/185/946/2019', `cnopnt` = NULL, `cnosnt` = 'SNT.00560/412/941/2021' WHERE `cnip` = '198505292008122002'; -- DHIKA DWI SRIWAHYUNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01363/028/443/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198809092010122003'; -- DYAH LISTYORINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01615/028/153/2019' WHERE `cnip` = '198408012010122008'; -- ENDARI WARDYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02832/185/665/2018', `cnopnt` = NULL WHERE `cnip` = '198302122005011001'; -- FEBRI ANDI NURHANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00856/028/399/2019' WHERE `cnip` = '198006182010122002'; -- IKE MARSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09015/185/895/2018' WHERE `cnip` = '198005142010122004'; -- INDAH WIDIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05370/185/505/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198701092009121005'; -- JANUAR TAUFIK
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08091/028/248/2021' WHERE `cnip` = '197407312001121001'; -- MARGONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09186/190/404/2018', `cnosnt` = NULL WHERE `cnip` = '197405172001122001'; -- SRI SUMANTI NUGRAHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09187/190/005/2018' WHERE `cnip` = '197103181993031002'; -- SUGENG SURYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02903/028/454/2022', `cnosnt` = NULL WHERE `cnip` = '196711091991031002'; -- WIDIATMONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10270/190/410/2019', `cnosnt` = NULL WHERE `cnip` = '197808012010122002'; -- ANIK MUSLIKAH INDRIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07119/185/118/2019' WHERE `cnip` = '198803022010121005'; -- ARIS DWI MAHARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01897/028/815/2017' WHERE `cnip` = '196312151987032001'; -- ARTININGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10271/190/911/2019' WHERE `cnip` = '198906152010122004'; -- ATIK SRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08964/197/627/2018' WHERE `cnip` = '197407082005011001'; -- BUDI SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10272/190/032/2019' WHERE `cnip` = '197007241993032001'; -- CHRISTINA YULIA PUSPITA DEWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10273/190/943/2019' WHERE `cnip` = '198504112009102001'; -- DANAR SUTARSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10274/190/144/2019' WHERE `cnip` = '198109212009101001'; -- DARYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10275/190/245/2019' WHERE `cnip` = '198112282009102002'; -- DINAR WINAHYU DAMAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08977/197/041/2018', `cnosnt` = NULL WHERE `cnip` = '198304142005011002'; -- DONY SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07132/185/643/2019', `cnosnt` = NULL WHERE `cnip` = '197108192006042006'; -- DWI AGUSETYANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01896/028/544/2017' WHERE `cnip` = '197201051998021004'; -- DWI DJOKO RAHMADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10276/190/646/2019', `cnopnt` = NULL WHERE `cnip` = '197210061992112001'; -- DWI PRASETYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10277/190/847/2019' WHERE `cnip` = '198607252008011006'; -- DWI WAHYUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08965/197/758/2018' WHERE `cnip` = '197412032008102002'; -- ELIJES HASTIJANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10278/190/558/2019' WHERE `cnip` = '198210042009102003'; -- ERNA DWI PUJIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08966/197/859/2018' WHERE `cnip` = '197104241991112001'; -- ERNANINGSIH SULESTIYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10279/190/959/2019' WHERE `cnip` = '197810302009102001'; -- ESI ASMARYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08975/197/169/2018' WHERE `cnip` = '196703051990022001'; -- FERLIJANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10280/190/781/2019' WHERE `cnip` = '199109262014041001'; -- HAGUNG RIHANJOYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08967/197/680/2018' WHERE `cnip` = '198810092010121008'; -- HARIS PUJIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10281/190/492/2019' WHERE `cnip` = '197911152005011002'; -- IHWAN HERIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08968/197/391/2018' WHERE `cnip` = '197907192001122001'; -- IKA IRAWATI MUSLIHATIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10282/190/033/2019' WHERE `cnip` = '197406032007012001'; -- LANJARIYANTI MUNAWAROCH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09079/185/115/2020' WHERE `cnip` = '197207052007011001'; -- AHMAD DHALAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10274/185/914/2020' WHERE `cnip` = '197811022006041001'; -- AHMAD ZAKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04146/185/415/2018' WHERE `cnip` = '196610101990031005'; -- ALI AKBAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04148/185/217/2018' WHERE `cnip` = '197811142001121001'; -- ASHARI DARMAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01221/010/96/2016' WHERE `cnip` = '197204152003121001'; -- BENNY AMIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09336/010/241/2019' WHERE `cnip` = '196406061990032003'; -- DASMI WARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08957/185/149/2020' WHERE `cnip` = '198012192014092002'; -- DEFRI HARTATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05220/185/549/2020' WHERE `cnip` = '198112302010012017'; -- DESSY SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09338/010/043/2019' WHERE `cnip` = '198008042008102001'; -- DEWI FITRIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11248/010/246/2019' WHERE `cnip` = '197803222001122002'; -- DEWI HERLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05710/010/143/2019' WHERE `cnip` = '197507112009102002'; -- DEWI INDRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10290/185/142/2020' WHERE `cnip` = '196405151989011006'; -- DODY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00490/010/543/2016', `cnopnt` = NULL WHERE `cnip` = '198401022008011004'; -- DONI ALFIAN AF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00901/010/550/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197202222005011009'; -- EDISON
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-10354/010/653/2021' WHERE `cnip` = '198102052009102001'; -- ELFA FEBRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05614/010/456/2019' WHERE `cnip` = '197008182001122001'; -- ERAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04127/185/154/2018' WHERE `cnip` = '198306042009101001'; -- ERIZON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05725/010/759/2019' WHERE `cnip` = '197908122009102002'; -- EVA YANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05733/010/568/2019' WHERE `cnip` = '196902171989032001'; -- FITRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03427/185/886/2020' WHERE `cnip` = '197910292005012001'; -- HARYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04130/185/708/2018' WHERE `cnip` = '198107292005011002'; -- JONI MARIKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08401/185/613/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196412301987032001'; -- ANNI HARYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02157/188/315/2019' WHERE `cnip` = '198404162014092003'; -- APRILA SANTHI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'BNT-06702/191/425/2022' WHERE `cnip` = '198102122000031001'; -- BAMBANG HARTOYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09763/185/245/2020' WHERE `cnip` = '198706102009122002'; -- DARA IMANIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02713/185/953/2019' WHERE `cnip` = '197008131992032001'; -- ERNA SAHYANTI TUSNIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03028/026/213/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198407032005012001'; -- ADRIANI DIMASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00559/026/419/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198404172010122002'; -- ANDINA SURYASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02697/026/034/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198205142005022010'; -- CAECILIA SRI WINEDARSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08783/026/846/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198402042010122004'; -- DIAN KURNIA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00146/026/841/2018' WHERE `cnip` = '198511212010122007'; -- DWI NOVRIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08922/026/781/2021' WHERE `cnip` = '197712192005022001'; -- HERLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00673/026/686/2017' WHERE `cnip` = '197212222005012001'; -- HOLY LATIFAH HANUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08786/026/399/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197406062014091002'; -- INDI PURNOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00690/026/395/2017' WHERE `cnip` = '197504252005012002'; -- INGRID DEWI REJEKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08787/026/390/2019' WHERE `cnip` = '197911052014092003'; -- ISTIANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08788/026/191/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197604132000032001'; -- ITA WARDANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00285/026/805/2018' WHERE `cnip` = '198010092005011004'; -- JOKO SARI UTOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01408/026/943/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198005062005011001'; -- MEI DIANA APRIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00392/026/654/2018' WHERE `cnip` = '198511292010122005'; -- NANIK WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00773/026/557/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198607132008012003'; -- NINIK PURWANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07116/185/195/2019' WHERE `cnip` = '198601242010122006'; -- RETNO ASIH WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00819/026/598/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196901092003122001'; -- RINI DWI HASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00820/026/590/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198302202005012002'; -- RINI KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00197/185/317/2021', `cnopnt` = 'BNT-00197/185/317/2021' WHERE `cnip` = '198110122011031001'; -- AFDHAL SIDDIQ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00213/001/216/2020' WHERE `cnip` = '198510172008122005'; -- ALFI MAWADDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06198/185/324/2020' WHERE `cnip` = '198704222006041001'; -- BAHAGIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06900/185/855/2020' WHERE `cnip` = '198104232009102002'; -- ERNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05648/185/153/2020' WHERE `cnip` = '197607292001122003'; -- EVI YULIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00215/001/388/2020' WHERE `cnip` = '197802152009102001'; -- HERLITA FERAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00214/001/817/2020' WHERE `cnip` = '197302062006041005'; -- KARYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03369/185/811/2020' WHERE `cnip` = '198005232006041002'; -- KHAIRUL IKHSAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05654/185/040/2020' WHERE `cnip` = '197807172008102001'; -- MAIZATUL AKMAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09390/185/041/2020' WHERE `cnip` = '197707092005012001'; -- MARLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04012/185/117/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198907082015041003'; -- ANDI SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03832/185/816/2020', `cnopnt` = NULL WHERE `cnip` = '198610032010011013'; -- ARMY BANGUN TRILAKSONO YUDANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02610/112/549/2020', `cnosnt` = 'SNT-07143/112/545/2021' WHERE `cnip` = '198805312015041002'; -- DANAR SANDI KUSUMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02565/112/748/2020', `cnosnt` = 'SNT-07141/112/743/2021' WHERE `cnip` = '196701121994011001'; -- DIDIK SINUNG HARYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08921/185/770/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199201232019031009'; -- GIOVANNI SAPUTRO CAHYO W
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10853/115/387/2018' WHERE `cnip` = '198312092015041001'; -- HENDRA TRI SETYAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08919/185/147/2020' WHERE `cnip` = '199302072019032025'; -- MASYITOH INDRI PRAYOGO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10120/115/674/2019' WHERE `cnip` = '198304292011012008'; -- PURI RATNA DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02701/112/700/2020' WHERE `cnip` = '197905152006042001'; -- SULISTYANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09299/185/719/2018' WHERE `cnip` = '197508172006041003'; -- AFFANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08365/185/512/2020' WHERE `cnip` = '198312292006042007'; -- ANDRIANI NURYANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'No. Sertifikat 01-02823-0623' WHERE `cnip` = '197001132005011001'; -- BURHANUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06256/051/049/2018' WHERE `cnip` = '198001012009102002'; -- DARMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05285/185/340/2019' WHERE `cnip` = '197911142005012007'; -- DEWI YUNITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08405/185/647/2020' WHERE `cnip` = '198712082010122004'; -- DWI HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06358/051/062/2018' WHERE `cnip` = '198202172009122001'; -- FATMAWATI AMIR
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00053146/121/3005/114/2021' WHERE `cnip` = '197906202005012001'; -- HAIRUN NISA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08544/185/991/2020' WHERE `cnip` = '198010192010012008'; -- IRMA SURY
UPDATE `kepeg_m_pegawai` SET `cnopnt` = NULL, `cnosnt` = '041491732940616' WHERE `cnip` = '197906132008011016'; -- AMBRAN MUTTAQIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01397/185/510/2021' WHERE `cnip` = '197908102006042002'; -- ARI FATKURROHMANIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '041237621895365', `cnosnt` = '041237621895365' WHERE `cnip` = '197503241999031002'; -- EKO SURYA WARDHANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'BNT-05283/185/958/2019' WHERE `cnip` = '197405032009101001'; -- EKO SUSILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-01445/046/864/2023' WHERE `cnip` = '198607072006041002'; -- FAJRIAN NUR DARMANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06896/185/139/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196912122005011001'; -- LA DOHI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01146/185/732/2021', `cnosnt` = 'BNT-01146/185/732/2021' WHERE `cnip` = '197806242009101001'; -- LA JAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03329/185/737/2021' WHERE `cnip` = '197103242007012001'; -- LILY AISYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '071801759036770', `cnosnt` = NULL WHERE `cnip` = '197305272009121001'; -- MANTONG
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05790/440/341/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198108152005012001'; -- MARIA ULFAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09183/190/141/2018' WHERE `cnip` = '197506302009121002'; -- MOCHAMMAD SIDDIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08338/185/592/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198303012009101001'; -- RASYID DJAMALUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06902/185/097/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198208202009102001'; -- RATIH AGUSTIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05063/191/194/2024', `dtgltbnt` = '2024-07-01', `dtglkbnt` = '2029-07-01', `dtglsertifikat` = '2024-07-01', `dtglkadaluarsa` = '2029-07-01' WHERE `cnip` = '198002102008021001'; -- RUDY HANTORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08926/185/475/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199006092015041001'; -- SHAHWIN PURNOMO AJI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11102/185/235/2019', `dtgltbnt` = '2024-12-20', `dtglkbnt` = '2029-12-20', `cnopnt` = 'PNT-02304/087/239/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = 'SNT-00858/087/231/2025', `dtgltsnt` = '2025-03-27', `dtglksnt` = '2030-03-27', `dtglsertifikat` = '2025-03-27', `dtglkadaluarsa` = '2030-03-27' WHERE `cnip` = '199108312014042001'; -- USWATUN HASANAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09332/191/047/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '199106042019022013'; -- VICKA CAHYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09363/191/681/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '199408052019022006'; -- ZULFIYAH PRAMUDYANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03381/191/125/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198508282010121004'; -- BUDIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10414/016/740/2018' WHERE `cnip` = '198102242010122001'; -- DELFIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02167/188/546/2019', `cnosnt` = 'BNT-02167/188/546/2019' WHERE `cnip` = '198606142014092002'; -- DENNA FITRIYANI SOESANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00847/016/149/2016' WHERE `cnip` = '198304152005012001'; -- DESI MERIA FITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02168/188/157/2019' WHERE `cnip` = '198101012014092007'; -- EKA LUSIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06333/016/355/2018' WHERE `cnip` = '197508042005012011'; -- ERNI GUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08138/185/970/2020' WHERE `cnip` = '198710212010012002'; -- GITA FARELYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00661/016/983/2017' WHERE `cnip` = '198404032009122004'; -- HASRINI VERAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00848/016/280/2016' WHERE `cnip` = '198403252008011003'; -- HERWIN SYAHRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02163/188/632/2019' WHERE `cnip` = '198712262014042001'; -- LENTI OKTAVIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07566/016/344/2018' WHERE `cnip` = '198003202014092006'; -- MARINI TRISIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00507/016/652/2017' WHERE `cnip` = '198411112008122002'; -- NONING AYUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00805/016/293/2017' WHERE `cnip` = '198502252008012005'; -- RANTY ANGGRAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00514/016/290/2017' WHERE `cnip` = '198511072010122001'; -- RIUWNI NOVITASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12987/016/307/2018' WHERE `cnip` = '197609292006042001'; -- SANTI ALDILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08144/191/207/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198403162008012005'; -- SITI MAISYARAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00845/016/807/2017' WHERE `cnip` = '198008112009121002'; -- SOLIHIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07354/043/119/2019', `cnopnt` = 'PNT-00452/043/111/2021', `cnosnt` = NULL WHERE `cnip` = '198909052014042001'; -- ANGELINA SOFYA FRISCILA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '031591322951352' WHERE `cnip` = '197605022003121002'; -- DEWANTORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06966/185/647/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198103312010121002'; -- DONFILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06892/185/065/2019' WHERE `cnip` = '198603302009102001'; -- FLORA CHISYASHITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04894/185/985/2020' WHERE `cnip` = '198404212005011002'; -- HADI KUSWORO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '01052641222' WHERE `cnip` = '198109242008121004'; -- IMANUEL JAYA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '101590541008698' WHERE `cnip` = '197803292005011004'; -- LENDRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00686/185/740/2021' WHERE `cnip` = '198503102005012001'; -- MARIA TRISNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05559/043/544/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198003032005011009'; -- MARTHONY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00769/185/152/2021' WHERE `cnip` = '199012272019032017'; -- NADIA CHRISTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00041017/121/3005/114/2022' WHERE `cnip` = '197303142006041001'; -- NAMPUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08111/087/971/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198206302005012002'; -- NINA YULIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09124/185/756/2018' WHERE `cnip` = '198904152015042003'; -- NURFITRINI RAMADHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02584/191/609/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198604262008011004'; -- SARIF HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10271/185/201/2020' WHERE `cnip` = '198311272015042001'; -- SITI ASIH WINDRIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06908/185/803/2019' WHERE `cnip` = '197601041999022001'; -- SRI SUZANNA CITRA AYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00366/416/825/2021' WHERE `cnip` = '196804282000121001'; -- TAHASAK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05572/043/979/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198606182014042001'; -- YOANDITA CHRISTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01134/185/419/2021' WHERE `cnip` = '197611272008012013'; -- ASMILAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01806/185/585/2021' WHERE `cnip` = '197301222001122002'; -- HASMAWATI HASAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01821/185/842/2021', `cnosnt` = NULL WHERE `cnip` = '197003082007012002'; -- MARDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09302/185/644/2018' WHERE `cnip` = '198001252009101001'; -- MUHAMMAD ARIS
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '82001118050612' WHERE `cnip` = '199112302019031015'; -- ANDI ROY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00818/067/197/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199103082014041001'; -- REKAYASA HADIANTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04945/067/672/2021' WHERE `cnip` = '198506162019031011'; -- YEDID YAH TULAK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09110/003/511/2021', `cnosnt` = NULL WHERE `cnip` = '196602101993122001'; -- AFNIZAR SABRIATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02123/003/518/2021' WHERE `cnip` = '198210312011031001'; -- AHDI MIRZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10236/185/632/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198511102019032010'; -- CARBUNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01859/185/233/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198909062015042004'; -- CITRA OVALISA RAHMI SIREGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09042/003/035/2021', `cnosnt` = NULL WHERE `cnip` = '197908242005042001'; -- CUT DINA HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10270/185/740/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198411302006041007'; -- DESI DEDI ARISANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04280/185/644/2021', `cnopnt` = 'PNT-06021/003/649/2022', `cnosnt` = NULL WHERE `cnip` = '198403012011032002'; -- DIAN ROSILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06900/185/855/2019' WHERE `cnip` = '199403202019032024'; -- ERNA SAFITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04414/003/883/2022', `cnosnt` = NULL WHERE `cnip` = '198808042015041003'; -- HERMAN SYAHPUTRA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08915/003/183/2022', `dtgltpnt` = '2022-10-06', `dtglkpnt` = '2027-10-06', `dtglsertifikat` = '2022-10-06', `dtglkadaluarsa` = '2027-10-06' WHERE `cnip` = '198109302005041001'; -- HUSNI MUBARRAK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01725/185/235/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197905102000122001'; -- LITA FADRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00629/003/947/2016' WHERE `cnip` = '198103162006041013'; -- MUHAMMAD EDWAR EFFENDY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05216/003/294/2021', `cnosnt` = NULL WHERE `cnip` = '197612151996121001'; -- RAFLIZAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00718/400/796/2022', `cnosnt` = NULL WHERE `cnip` = '197809302005041001'; -- RINALDI ISWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT - 01902/185/102/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198103082006042006'; -- SERI MULYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12444/003/525/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198508132015041001'; -- TEUKU ONI AMIRZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00564/003/855/2019', `cnopnt` = 'PNT-07506/003/858/2022', `cnosnt` = NULL WHERE `cnip` = '198608062015041002'; -- WAHYU SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04302/185/779/2021', `cnopnt` = NULL, `cnosnt` = 'SNT-06761/003/770/2024' WHERE `cnip` = '199301222019031009'; -- YASIR HARIEMUFTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00628/003/986/2016', `cnopnt` = 'PNT-09821/400/980/2022', `cnosnt` = NULL WHERE `cnip` = '196910122003121005'; -- ZAFHURI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05224/003/683/2021', `cnosnt` = NULL WHERE `cnip` = '197908112002121001'; -- ZULFIRMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09068/191/853/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198802282015042007'; -- EKA RANIASTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02741/062/804/2020' WHERE `cnip` = '198005052008012032'; -- JUMRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01086/062/835/2017', `cnopnt` = NULL, `cnosnt` = 'SNT-02307/062/832/2021' WHERE `cnip` = '197811012006042001'; -- LISA HUMAIRAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01685/185/430/2021', `cnopnt` = NULL, `cnosnt` = 'BNT-01685/185/430/2021' WHERE `cnip` = '198704232015042002'; -- LUSIANA DEWI ANGGRAENI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'SKP-00444/2.3.1.1.083.R/03/03/20' WHERE `cnip` = '199009032015041001'; -- MUHAMMAD  ASWAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10282/185/653/2020' WHERE `cnip` = '198906212010121005'; -- NURUL FALAH KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04511/185/071/2017' WHERE `cnip` = '197104082006041001'; -- PURNOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04170/185/392/2017' WHERE `cnip` = '198601082005011001'; -- RIDWAN ISWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08651/185/390/2020' WHERE `cnip` = '197808192008012019'; -- RINI ABDULATIF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09679/062/901/2018' WHERE `cnip` = '197810032001121001'; -- SANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09715/062/102/2018' WHERE `cnip` = '198108132001122001'; -- SURIYANTI LILIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09736/185/225/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197108062008122001'; -- TRIANA AGUSETIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09760/062/172/2018' WHERE `cnip` = '198206142006042001'; -- YUNINGSIH MOKODOMPIT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00398/042/410/2017' WHERE `cnip` = '198809272010122007'; -- ALNY NURLISA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01369/042/619/2017', `cnopnt` = '-' WHERE `cnip` = '198205102005012002'; -- ARDHISTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04666/191/412/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198910152010122002'; -- ARYANIE SAGITA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = '-' WHERE `cnip` = '197711082009101001'; -- EDI LUKMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07881/042/254/2018' WHERE `cnip` = '197708192009121003'; -- EKO GUNAWAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197107262009102001'; -- INDRA JUWITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02001/042/693/2017' WHERE `cnip` = '197701012001121001'; -- INDRA YUSRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00795/042/191/2016' WHERE `cnip` = '198409192008122002'; -- IRMA SUKMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02718/185/448/2019', `cnopnt` = 'PNT-06643/042/449/2023' WHERE `cnip` = '198709192009121003'; -- MUHAMMAD EFFAN MUHARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01199/191/400/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198705312010122005'; -- SAIMIMA SAFITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT.07831/042/209/2021' WHERE `cnip` = '197905102005012001'; -- SYARIFAH MAYLANI ANGGRAINI ALMUTAHAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10161/042/259/2018' WHERE `cnip` = '197611162001122002'; -- WAHYU WIDYA NINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04155/185/505/2018', `cnopnt` = 'PNT-08149/036/512/2021', `cnosnt` = NULL WHERE `cnip` = '198401202014041002'; -- JAINUL AGUS PRIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08725/036/832/2021', `cnosnt` = NULL WHERE `cnip` = '198608062014042002'; -- LAILY ULFIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08817/185/834/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197105052014062002'; -- LILIK KHOLIFATUR ROSYIDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10250/185/198/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199605292019032012'; -- RINA IZZATUL ILMI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-.' WHERE `cnip` = '199006042015042002'; -- SAKINA SETYOWATI PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '199005172018032001'; -- TRISTIANDINDA PERMATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01965/054/11/2017' WHERE `cnip` = '196906281993032001'; -- BARLIAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09770/054/523/2021' WHERE `cnip` = '196212311988031025'; -- BASO DARWISAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02186/054/267/2017' WHERE `cnip` = '196903312000122001'; -- FATMAWATI PODDING
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07674/054/284/2021' WHERE `cnip` = '197312091998022001'; -- HARDIANA  HR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02200/054/214/2017' WHERE `cnip` = '197804122001122003'; -- KHUMSIAR AMIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02704/185/913/2019' WHERE `cnip` = '197608182005011001'; -- MATTOTORANG K
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02178/054/008/2017' WHERE `cnip` = '196503061989032003'; -- SITTI AMMANI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-03031/082/017/2022' WHERE `cnip` = '198603122019031006'; -- ALI RACHMAN KOMARUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08443/191/019/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408282014041001'; -- ALTRIN GUPMANDAI AMBUI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04826/191/080/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198109202009032002'; -- HELDA KOSU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04970/185/590/2017' WHERE `cnip` = '198605062010011007'; -- RICHARD ROLANDO AMUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06763/185/312/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198811052019032015'; -- AGATA NOVI ANINDITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09735/021/324/2021', `cnosnt` = NULL WHERE `cnip` = '198802142015041001'; -- BUDI PRABOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02573/191/397/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198907272015042003'; -- IDA ARIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '197909152015041001'; -- NUNU NUGRAHA PURNAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00467/021/707/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197307192007011002'; -- SUTARYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09180/190/338/2018' WHERE `cnip` = '198508112010122002'; -- CHOIRIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00047/026/341/2020' WHERE `cnip` = '197112202001122001'; -- DWI ASTI ISTIARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07122/185/962/2019' WHERE `cnip` = '197412052014092002'; -- FIFI NURHAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05102/087/268/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197909162008121002'; -- FUAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04505/185/394/2017' WHERE `cnip` = '198810062014041002'; -- IMAM WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10304/088/08/2018', `dtgltbnt` = '2023-09-04', `dtglkbnt` = '2028-09-04', `dtglsertifikat` = '2023-09-04', `dtglkadaluarsa` = '2028-09-04' WHERE `cnip` = '197709072006042001'; -- NURSJAMSIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03121/185/767/2017' WHERE `cnip` = '199110242015042001'; -- OCTAVIANI KHRISTIYA HAPSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'PNT-10919/030/290/2023', `cnopnt` = 'PNT-10919/030/290/2023', `cnosnt` = NULL WHERE `cnip` = '198202192008121001'; -- RAIS FAISAL AHYAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05066/185/097/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `cnopnt` = 'PNT-02141/440/098/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197711222005012001'; -- RINI KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03194/185/297/2017' WHERE `cnip` = '196709191998022001'; -- ROSMINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0274/2.3.1.2.8/03/00/2014', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196706191991032001'; -- SAMSIAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04905/191/408/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197003132003121002'; -- SARTANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11254/191/103/2024', `dtgltbnt` = '2025-01-02', `dtglkbnt` = '2030-01-02', `dtglsertifikat` = '2025-01-02', `dtglkadaluarsa` = '2030-01-02' WHERE `cnip` = '197802132008012017'; -- SARYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02773/185/109/2017' WHERE `cnip` = '197109042007011002'; -- SUHARPONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06817/088/352/2018', `cnopnt` = 'PNT-08908/136/355/2024', `dtgltpnt` = '2024-12-31', `dtglkpnt` = '2029-12-31', `dtglsertifikat` = '2024-12-31', `dtglkadaluarsa` = '2029-12-31' WHERE `cnip` = '197903222006041003'; -- WISNU GANDJAR NURPATRIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11285/191/077/2024', `dtgltbnt` = '2025-01-02', `dtglkbnt` = '2030-01-02', `dtglsertifikat` = '2025-01-02', `dtglkadaluarsa` = '2030-01-02' WHERE `cnip` = '198604022019022003'; -- YOHANA PREMAVARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03201/185/476/2017' WHERE `cnip` = '198406152005012001'; -- YUNITA KURNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08025/031/215/2023' WHERE `cnip` = '197811052001122001'; -- AVY LUTHFIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03956/185/193/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198907252010122004'; -- INGGAWATI FANI PAMELA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08269/031/145/2023', `cnosnt` = NULL WHERE `cnip` = '197804022003121002'; -- MARDI SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08150/031/244/2023' WHERE `cnip` = '197208051997021001'; -- MUH ANIS MUSTAGHFIRIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06734/185/400/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198008082010122002'; -- SUCI RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01477/031/679/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196903082000031001'; -- YASMANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07078/185/912/2019' WHERE `cnip` = '198606182015042001'; -- ANIES INAYATULLOH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04731/185/535/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198501292014041001'; -- CATUR PRIYO UTOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07083/185/148/2019' WHERE `cnip` = '198012192008102002'; -- DESI NURAFNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02829/185/341/2018' WHERE `cnip` = '198612152010122005'; -- DESRINA ARININGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07074/185/048/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198503132015042001'; -- DIAN RETNOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07067/185/450/2019' WHERE `cnip` = '197612082008102001'; -- EKO DESI EROWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09471/031/851/2018' WHERE `cnip` = '197403042005011002'; -- EKO WAHYUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07066/185/369/2019' WHERE `cnip` = '198906282015042003'; -- FATIMAH SARIRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07077/185/461/2019' WHERE `cnip` = '198909262015042001'; -- FATIMATUZ ZAHROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07071/185/875/2019' WHERE `cnip` = '199104132015041001'; -- GUNTUR JOKO PRASETYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07070/185/384/2019' WHERE `cnip` = '198803222015042002'; -- HERLINA VANESSA VITARADIAZ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0046/2.3.1.2.211/03/00/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198311242010121003'; -- HERU PRASETYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07081/185/946/2019', `cnopnt` = NULL WHERE `cnip` = '198505102014092002'; -- MARIYAMIDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07080/185/745/2019' WHERE `cnip` = '197909112009101004'; -- MUGIONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02050/194/647/2019' WHERE `cnip` = '198303022009102002'; -- MUJAYANAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07079/185/363/2019' WHERE `cnip` = '198507212010121003'; -- OKI MUSHLAHUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09636/031/274/2018' WHERE `cnip` = '197412172009101001'; -- PUSPO ANGGONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07075/185/499/2019' WHERE `cnip` = '198012122009102002'; -- RENI  FIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07082/185/897/2019' WHERE `cnip` = '198706072010122008'; -- RIRIN LINDAH WATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07135/185/196/2019' WHERE `cnip` = '199202172015042001'; -- RISKA FEBRIANA PRATIWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06279/060/214/2022', `cnosnt` = NULL WHERE `cnip` = '198006262008011008'; -- ALIMIN DIMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10641/060/812/2019' WHERE `cnip` = '197801202014092001'; -- ANNAWAI ARMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00091/060/610/2016' WHERE `cnip` = '198111232008011010'; -- ARLAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07774/060/315/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198711152009122005'; -- ASBIYANI NASRUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03780/185/518/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198510102009121008'; -- ASWIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10636/060/666/2019' WHERE `cnip` = '197904242009102002'; -- FITRIANINGSI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03328/185/566/2020' WHERE `cnip` = '198606142010122007'; -- FITRIAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09913/060/172/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198203082009101001'; -- GUNAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10625/060/484/2019' WHERE `cnip` = '197012312014091006'; -- HALIFATULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01125/060/389/2019' WHERE `cnip` = '198001042006042002'; -- HAMLIA MASI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10615/060/683/2019' WHERE `cnip` = '197002072014092001'; -- HASMIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12468/060/581/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197806042009122001'; -- HASMILIN MUIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10644/060/295/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197904112005011003'; -- ISHAK ISMAIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04473/185/698/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198006112014091003'; -- ISRA RAJAB OJIDOPO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00090/060/199/2016' WHERE `cnip` = '197203092009121001'; -- I WAYAN SUTAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06815/185/230/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198205252008011016'; -- LA ODE MOIMPO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07775/060/936/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197608172009121007'; -- LA SAMUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04745/185/040/2020' WHERE `cnip` = '197306042009122001'; -- MIRASNAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06753/185/411/2020' WHERE `cnip` = '198801162015042001'; -- ANGGI ANGGRAENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02972/185/730/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198012062009102003'; -- CHARMILAH NURHAYATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '0' WHERE `cnip` = '196201101987011001'; -- GUGUS IRIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09181/190/799/2018' WHERE `cnip` = '197806152009101002'; -- IBNU RAHARJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08419/032/212/2019' WHERE `cnip` = '198409102009121004'; -- KHARISMA AULIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04080/185/712/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198709302019031006'; -- AGUNG BAGUS ABDULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-01742/033/614/2021' WHERE `cnip` = '198608312014041001'; -- AGUNG WICAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04147/185/116/2018' WHERE `cnip` = '199007142015041001'; -- ARIEF SATRIA NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00248/033/850/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199001262014042001'; -- ESKA HUDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01450/033/940/2020', `cnosnt` = NULL WHERE `cnip` = '197810032015041001'; -- MUHAMMAD TAALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04972/185/192/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199302252015042001'; -- ROMA DWI PURWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06058/185/609/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199304192019032030'; -- SHERLY AYU APRYLYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01422/033/309/2020', `cnosnt` = NULL WHERE `cnip` = '198105182014041001'; -- SULUH ARGO PAMBUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04895/191/746/2022', `cnopnt` = NULL, `cnosnt` = 'SNT-07693/134/745/2022' WHERE `cnip` = '198404292015042002'; -- DEWI APRILIANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09644/185/493/2020' WHERE `cnip` = '199108152019032020'; -- INDAH TIVANI PURWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02164/188/893/2019' WHERE `cnip` = '198602202015042003'; -- RATNA JUWITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-0586/191/105/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198608092019032016'; -- SANTRISIA SIAGIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02849/185/123/2018' WHERE `cnip` = '198907252015042001'; -- TIRA JULIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01550/185/541/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199210212019032017'; -- DIANI DWI OKTAVIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00816/191/465/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199408122019032019'; -- FIONNA ARAMINTA FABIOLA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SKP-00783/2.3.1.1.082.R/03/03/20' WHERE `cnip` = '199104142019031008'; -- SY MUHAMMAD ZAKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00433/168/210/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198706102015041002'; -- ANGGA ANGGASMARA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04769/185/016/2018' WHERE `cnip` = '198508272010012013'; -- ARBAINAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00397/168/449/2019', `cnopnt` = 'PNT-04982/165/443/2023', `cnosnt` = NULL WHERE `cnip` = '198808192015041002'; -- DITA PERMANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04772/185/360/2018' WHERE `cnip` = '198907092015042005'; -- FARIDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05743/185/209/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199206142019031011'; -- JUNAIDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01968/191/444/2022' WHERE `cnip` = '199103012019031014'; -- MOCH. DARMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00697/165/542/2020', `cnosnt` = NULL WHERE `cnip` = '196309161989021003'; -- MUHAMMAD ARIF MUTAQIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07092/185/198/2020', `cnopnt` = 'PNT-08737/165/195/2021', `cnosnt` = 'SNT-08018/165/197/2022' WHERE `cnip` = '198301092006042016'; -- RETNO FIDIANASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01130/168/105/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198108312005011007'; -- SUGENG MUKTI WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10259/185/907/2020' WHERE `cnip` = '199401232019032016'; -- SUSILOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-03991/417/722/2021' WHERE `cnip` = '196205041987031018'; -- TEKAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03136/185/823/2021', `cnopnt` = NULL, `cnosnt` = 'SNT-08507/165/820/2021' WHERE `cnip` = '198911272019031015'; -- TOTO ISWANTO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08215/440/996/2026', `dtgltpnt` = '2026-07-03', `dtglkpnt` = '2031-07-03', `dtglsertifikat` = '2026-07-03', `dtglkadaluarsa` = '2031-07-03' WHERE `cnip` = '198102082005011003'; -- RAKEAN SUNDAYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01704/191/092/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198209012008102001'; -- RINI HAPSARI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-07130/087/491/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '199111022014042001'; -- RISZKA INDRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05280/440/505/2026', `dtgltbnt` = '2026-07-27', `dtglkbnt` = '2031-07-27', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-27', `dtglkadaluarsa` = '2031-07-27' WHERE `cnip` = '197201051992032001'; -- SRI LESTARININGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01266/088/305/2020', `cnopnt` = 'PNT-05511/087/302/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197405072006041002'; -- SUWADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01973/088/320/2017' WHERE `cnip` = '197104292007011001'; -- TEGUH RAHAYU SLAMET
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04968/191/627/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198003052005012004'; -- TIWIEK DARMAWANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-00736/087/256/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197603242005011001'; -- WENDI KUSWANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05319/440/078/2026', `dtgltbnt` = '2026-07-27', `dtglkbnt` = '2031-07-27', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-27', `dtglkadaluarsa` = '2031-07-27' WHERE `cnip` = '197202182005012002'; -- YUSI SOPIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08487/185/827/2018' WHERE `cnip` = '196809051991031001'; -- TOTO SUPRIYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06203/191/711/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198401042005012001'; -- ARIAMA SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04393/185/889/2020' WHERE `cnip` = '198411132010121005'; -- HERU INDRABUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-12134/004/141/2021', `cnosnt` = NULL WHERE `cnip` = '197208222005011003'; -- M RIKWAN EFFENDI SALAM MANIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03800/185/571/2021' WHERE `cnip` = '198710092010122006'; -- PUTRI SYUHADA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04321/191/190/2024' WHERE `cnip` = '198010022009122003'; -- RACHMANI TARIGAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05047/185/196/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198611232010122003'; -- RAHMADANI KOTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-12133/004/190/2021', `cnosnt` = NULL WHERE `cnip` = '196904112002121001'; -- RISWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08317/185/209/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196508301990021001'; -- SUCIPTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01128/185/572/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198410202010121003'; -- YUSNAR YUSUF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-12132/004/689/2021' WHERE `cnip` = '198607232008121006'; -- ZULFIKAR HARAHAP
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03881/185/950/2018' WHERE `cnip` = '198105232009111001'; -- WAHYU SETIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00036060/121/3005/114/2023', `cnosnt` = NULL WHERE `cnip` = '197311162008121001'; -- ALEXANDER SIMON TANODY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04972/185/302/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197906012006042001'; -- JENNY PAULINA LEMBA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05044/185/413/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198610092009101001'; -- KAMISLON O BANUNAEK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02014/039/947/2018', `cnopnt` = NULL, `cnosnt` = '00042371/121/3005/114/2021' WHERE `cnip` = '198103252014042001'; -- MORINA LEONORA RATUHALIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00041519/121/3005/114/2021', `cnosnt` = NULL WHERE `cnip` = '197710092005011002'; -- ROBYNSON WILLSON OKTOVIANUS AMSEKE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08961/185/604/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197905142008121002'; -- SUDARSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04976/185/006/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198407292009122007'; -- SUMARTIN SELFINA LONA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10378/088/329/2021', `cnosnt` = NULL WHERE `cnip` = '197703062005011002'; -- BUSTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04583/185/960/2021', `cnopnt` = 'PNT-11410/088/967/2021', `cnosnt` = NULL WHERE `cnip` = '199201252019031014'; -- FADHAL FAJRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09495/089/267/2018' WHERE `cnip` = '198104272010122002'; -- FARHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08264/185/090/2020' WHERE `cnip` = '197703212009101001'; -- ISMAIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04963/185/312/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197912132003122004'; -- KAMARIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06854/185/713/2020' WHERE `cnip` = '198508242010121002'; -- KHAIRUN NAHAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07363/088/749/2022' WHERE `cnip` = '197606172003121003'; -- M. FAUZAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06896/185/549/2020', `cnopnt` = 'PNT-11408/088/544/2021', `cnosnt` = NULL WHERE `cnip` = '198009082009121004'; -- MUHAMMAD NASIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03583/088/249/2022', `cnosnt` = NULL WHERE `cnip` = '197806102005011002'; -- MUKHLIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03584/088/840/2022', `cnosnt` = NULL WHERE `cnip` = '197812022003121003'; -- MUKHLIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06898/185/741/2020' WHERE `cnip` = '197603102005011002'; -- MUZAKKIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06667/185/795/2020' WHERE `cnip` = '197601032009102001'; -- ROSLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06672/185/201/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197504152005011002'; -- SAIFUL HADIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06918/185/904/2020' WHERE `cnip` = '198404122009041004'; -- SAYED MURTADHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11507/191/044/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197910032009102001'; -- VERONIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04408/191/876/2022', `cnopnt` = 'PNT-10390/088/873/2021', `cnosnt` = NULL WHERE `cnip` = '198306102005011001'; -- YASIR ARAFAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-10399/088/382/2021' WHERE `cnip` = '197809182003121001'; -- ZULFIKAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05478/185/784/2021', `cnopnt` = NULL, `cnosnt` = 'SNT-11409/088/785/2021' WHERE `cnip` = '198508062010121007'; -- ZULFIKRIE RASMA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'PNT-00950/143/454/2020' WHERE `cnip` = '199012022015042001'; -- EMILI LILIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03383/185/717/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198903072015042002'; -- KADE WAHYU SAPUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00024533/121/3005/114/2022' WHERE `cnip` = '198705032019032012'; -- NETI SUMARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01447/191/976/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199412302019031005'; -- PRAYOGA GUMILAR GERI WINARNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07046/191/567/2023', `dtgltbnt` = '2023-12-14', `dtglkbnt` = '2028-12-14', `cnopnt` = NULL, `cnosnt` = 'SNT-13336/022/566/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197006112002121001'; -- ODANG BUDIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03164/185/204/2017' WHERE `cnip` = '197802142001121002'; -- SOLIH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SKP-00857/2.3.1.1.082.R/03/03/20' WHERE `cnip` = '196802181990101001'; -- SUMARNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06409/022/859/2021', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197611032010121002'; -- WANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08321/185/054/2020' WHERE `cnip` = '196506301989031001'; -- WAWAN SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04108/185/303/2018' WHERE `cnip` = '198909252015042008'; -- SHINTA DEWI ATSENO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00025094/121/3005/114/2025', `cnosnt` = NULL WHERE `cnip` = '198206122008011013'; -- WAWAN SAEPUL IRWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07324/185/976/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197606192005012001'; -- YETTI MULYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01817/185/277/2019' WHERE `cnip` = '198708092011011005'; -- YOSUA ADRIAN PASARIBU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03858/185/254/2018' WHERE `cnip` = '196408312000031001'; -- WIYONO UNDUNG WASITO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00055/088/410/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198607212008122002'; -- ANGGIN PRATIWI YUANTORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04151/185/741/2018' WHERE `cnip` = '198512102008012002'; -- DESY MARYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07117/185/956/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198012082010122001'; -- EKA PRASETIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06339/088/551/2018' WHERE `cnip` = '198304282010122003'; -- ESTI PRASASTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02109/087/072/2020', `cnosnt` = NULL WHERE `cnip` = '198001102001121001'; -- PONIMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04164/185/005/2018' WHERE `cnip` = '197609172002122001'; -- SUHARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05396/087/823/2022', `cnosnt` = NULL WHERE `cnip` = '196901111998022001'; -- TITI SUHARTATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = '-' WHERE `cnip` = '195812311989031019'; -- ARUNG LAMBA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04659/185/334/2020' WHERE `cnip` = '198406052009122006'; -- CHATRINE GRACE IMELDA HENDAMBO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04641/185/755/2020' WHERE `cnip` = '197707152008012019'; -- EDITYA NUNUN ARYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06927/185/654/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198010072010122001'; -- ELEND FRANSISKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04247/185/767/2020' WHERE `cnip` = '198709122009121008'; -- FADLY YIZHAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10283/185/984/2020' WHERE `cnip` = '198809132008012001'; -- HASNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09080/185/397/2020' WHERE `cnip` = '197908182006042001'; -- INDRASTUTI DWI WAHYUNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05608/185/149/2020' WHERE `cnip` = '198212172008121002'; -- MICHAEL SUNYAW WEYAI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '198401082008012006'; -- ORPA RAHEL MOMOT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04790/185/590/2020' WHERE `cnip` = '198510102014091002'; -- REVILINO ONY SOUKOTTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03724/185/196/2020' WHERE `cnip` = '198511062008122001'; -- RIAN NOVIANI SOLISSA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05753/185/200/2020' WHERE `cnip` = '198509282014091001'; -- SEMUEL MSIREN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02844/185/408/2018' WHERE `cnip` = '197403191999032003'; -- SHANTY SHINTA TUPAMAHU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08953/185/675/2020' WHERE `cnip` = '198605162009122005'; -- YOCIANA KELUNGGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00700/063/877/2022', `cnosnt` = NULL WHERE `cnip` = '196607181996101001'; -- YUNUS WAFOM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04770/185/538/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197410032005012002'; -- CHRYSIANTI PATTIASINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03424/191/243/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198904012010122002'; -- DEBIOLA PERSULESSY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08560/185/449/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197602092009122003'; -- DENY TRIENCE SIAHAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04771/185/049/2018' WHERE `cnip` = '199202072010122001'; -- DIAN FERINDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06624/061/848/2019' WHERE `cnip` = '197808232002122003'; -- DIANNA DELVYE LEATOMU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04792/185/962/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198305212008122002'; -- FITRIA ADAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04793/185/563/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198005112009122002'; -- FLORIDA ROSALYN MEILAN WAAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00207/061/569/2024' WHERE `cnip` = '198112032006041002'; -- FRANS VERY ANDERIAS SIKTEUBUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04794/185/264/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196311291987031002'; -- FRITS MOZES LEKATOMPESSY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '09099/185/877/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199007112010122002'; -- GLADIS VINKAN MOLLE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08965/185/378/2020' WHERE `cnip` = '198407222009122003'; -- GRACE LATUHERU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04776/185/184/2018' WHERE `cnip` = '197205252000032001'; -- HELENA MAGDALENA NOYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04797/185/387/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198410282008012004'; -- HIKMAWATY MADUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05013/061/689/2019' WHERE `cnip` = '197005131995011001'; -- HYSBERD LEONARD LATUHERU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01861/061/446/2023', `cnosnt` = NULL WHERE `cnip` = '196102141988031002'; -- JANTJE TJIPTA BUDY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03940/061/706/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199108272009122001'; -- JOAN SELANNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06625/061/009/2019' WHERE `cnip` = '198001292008012008'; -- JOLANDA RAHABEAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05011/061/607/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198103312008122002'; -- JULITA IRENE VICTORIA TEHUSALAWANY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0324/191/243/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198207262008122002'; -- LISSA EMELDA PATTIKAWA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09040/061/933/2021' WHERE `cnip` = '197207032000032001'; -- LUSSI R LOPPIES
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04778/185/246/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196508031986031002'; -- MARKUS RIUPASSA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10331/061/548/2023', `cnosnt` = NULL WHERE `cnip` = '197805142005012003'; -- MERCY PERSULESSY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04779/185/257/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198606202014042001'; -- NELMA BARLEIN MONIHARAPON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01625/093/844/2017' WHERE `cnip` = '198312312014042001'; -- DIAN DIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00390/093/652/2019' WHERE `cnip` = '198307262015041001'; -- EKO BUDIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02563/093/156/2020' WHERE `cnip` = '199210092019031014'; -- NUR EKO PAMUNGKAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11536/093/976/2019' WHERE `cnip` = '197606192005021003'; -- Pandriadi
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00027833/121/3005/114/2021' WHERE `cnip` = '199201192019031013'; -- RAKA BAGJA NUGRAHA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03211/147/417/2024', `cnosnt` = NULL WHERE `cnip` = '198410012019031011'; -- ANANG WIDIGDYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01934/150/857/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198908302015042003'; -- ELOK HASTARI CANDRAPUSPA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09017/185/847/2018' WHERE `cnip` = '199203222018031001'; -- M. NUR FU`AD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09125/185/897/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198409252015042002'; -- RANI ARIFAH NORMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04036/009/553/2019', `cnosnt` = NULL WHERE `cnip` = '199104012015042003'; -- ERMA FITRIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04179/009/961/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198606092015042002'; -- FITRIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT/05994/191/087/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199302062019031007'; -- HABIBI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-08988/407/683/2022' WHERE `cnip` = '198905042014041001'; -- HARY WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT/2660/191/684/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198410032019032009'; -- HERLINA TRI ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT/05644/191/659/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199612082020122005'; -- NURFAJRI DIENAGUNA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-03949/009/575/2022', `cnosnt` = 'PNT-03949/009/575/2022' WHERE `cnip` = '199106272014041001'; -- PUTRA KIRANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05889/009/290/2022', `cnosnt` = NULL WHERE `cnip` = '197406142006041012'; -- RIZALDY SIREGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10281/185/112/2020' WHERE `cnip` = '198908242019031013'; -- AGUSTINUS PIETER ADRIAN HONORATUS TALLAUBUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10263/185/442/2020', `cnosnt` = 'BNT-10263/185/442/2020' WHERE `cnip` = '198803142018031001'; -- DANDI SALEKY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00016/191/157/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197609182003122009'; -- ERNI DWITA SILAMBI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07822/185/349/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198103292012122001'; -- MARIA VERONICA IRINE HERDJIONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08193/191/061/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199410152019031014'; -- OSNER SIHOTANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07965/185/997/2020', `cnopnt` = 'BNT-07965/185/997/2020' WHERE `cnip` = '197512312012122006'; -- REINYELDA. D. LATUHERU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10279/185/059/2020' WHERE `cnip` = '199002272019032020'; -- WIDITRA FETTY MARGARET
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02504/191/991/2024', `cnopnt` = NULL, `cnosnt` = 'SNT-03318/046/995/2022' WHERE `cnip` = '198810112010121006'; -- IRWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09777/046/840/2019', `cnopnt` = NULL, `cnosnt` = 'SNT-02133/046/849/2024' WHERE `cnip` = '197710031999032001'; -- MULIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01249/046/756/2017' WHERE `cnip` = '198611292009122006'; -- NURLITA NISA HANDINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01534/191/303/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198008162009122001'; -- SRI MURHASTUTI WAHYU MARDIKANINGGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-03384/046/908/2022' WHERE `cnip` = '196606101989021001'; -- SUGITO, S.Tr.Kom
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06707/191/990/2022' WHERE `cnip` = '198711202009121006'; -- ROBBY PRIMA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02159/188/457/2019' WHERE `cnip` = '197004032014092003'; -- WUWUH SOTYA KARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06566/185/383/2020' WHERE `cnip` = '199505222019022010'; -- ZIAH NUR AISJAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01961/011/217/2022', `cnosnt` = 'SNT-01741/402/213/2021' WHERE `cnip` = '197701252005011003'; -- ADRIAN NASRUN PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10246/185/663/2020' WHERE `cnip` = '198609032014042001'; -- FADILLA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10261/185/090/2020' WHERE `cnip` = '198403232008012003'; -- INDAH SETIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05624/011/397/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198202182003122001'; -- ISNANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10050/011/556/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196701011988032001'; -- NEWIS YERLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04966/185/355/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198410282008122004'; -- NOVA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10051/011/697/2019' WHERE `cnip` = '196703191991032002'; -- RATMANELIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10052/011/178/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196606121989032001'; -- YETRINELDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03132/185/389/2017' WHERE `cnip` = '196702171991032001'; -- ZURYANITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04905/191/018/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199607172019031001'; -- ANGGIT BAYU SASONGKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09627/185/844/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198807232019031015'; -- DHIMAS SETYA PAMUNGKAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01320/026/96/2017' WHERE `cnip` = '196512231989011001'; -- BAMBANG WIDODO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12191/187/044/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198605292015041001'; -- DANANG KUSUMO PROJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05284/185/549/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198706222010012016'; -- DIAN EKA SRI KUSUMANINGTYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05279/185/993/2019' WHERE `cnip` = '198607262015042001'; -- RULIATIMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00834/026/805/2017' WHERE `cnip` = '196910022001121001'; -- SARWONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01289/191/500/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199209142019032019'; -- SYAI`DATINA ZAHROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00631/046/750/2017' WHERE `cnip` = '197508252000122001'; -- ENNY PUSPITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08322/191/485/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197905122001122002'; -- HARIATI, S.E
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02013/191/686/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198503282009122003'; -- HERUNISA, S.E
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01870/046/196/2017' WHERE `cnip` = '196607201989032001'; -- RATNA MARIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00495/046/398/2018' WHERE `cnip` = '196501101989032001'; -- RUSIYAH NUR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07451/046/307/2023', `cnosnt` = NULL WHERE `cnip` = '197001232002121001'; -- SUJOKO HASTANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01091/191/751/2023' WHERE `cnip` = '199002152014042001'; -- ESTER
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01148/010/064/2018' WHERE `cnip` = '198604112010122004'; -- FRIZA GUSTIA NINGSIH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06536/010/880/2023' WHERE `cnip` = '198203052006041002'; -- HENDRA TRI NATA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09995/010/882/2023' WHERE `cnip` = '197406291999031003'; -- HENRY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00486/010/148/2016' WHERE `cnip` = '198305142008122003'; -- MAKNA ANI MARLIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00213/010/756/2017' WHERE `cnip` = '197809032000032001'; -- NOVIA SEPTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03757/191/892/2023', `cnopnt` = 'BNT-03757/191/892/2023' WHERE `cnip` = '198701022008012002'; -- RIA AMELIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00487/010/799/2016' WHERE `cnip` = '197812092002122002'; -- RURI DERINI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06537/010/601/2023', `cnosnt` = NULL WHERE `cnip` = '197705252000121002'; -- SARMIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01233/010/909/2016', `cnosnt` = 'SNT-05844/010/901/2023' WHERE `cnip` = '197504032005011003'; -- SYAIFUL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01483/017/926/2020', `cnosnt` = NULL WHERE `cnip` = '196701141992031005'; -- BENI HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05681/185/290/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198711052008121001'; -- RIKI PURNAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12200/187/205/2018' WHERE `cnip` = '198511162009121004'; -- SETIA BUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02156/188/004/2019' WHERE `cnip` = '197306042003122001'; -- SINAR PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00301/017/504/2016' WHERE `cnip` = '197211132000032001'; -- SRI ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06717/017/701/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197606172000122001'; -- SRI HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10898/017/206/2022', `cnosnt` = NULL WHERE `cnip` = '197910052008011016'; -- SUPRIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00219/017/082/2021' WHERE `cnip` = '197010021993031003'; -- ZAHERMANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00567/131/518/2016' WHERE `cnip` = '196506261991031001'; -- AGUNG SATRIJA SIAGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02702/185/311/2019' WHERE `cnip` = '197604062000121001'; -- AGUNG WICAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04231/185/010/2020' WHERE `cnip` = '198305132009121001'; -- ANDIK SUSANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09300/185/622/2018' WHERE `cnip` = '198707222014042001'; -- BETTY PRAMUDITA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11951/188/247/2018' WHERE `cnip` = '197712232014092001'; -- DESI SUSANTI ANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03426/185/645/2020' WHERE `cnip` = '198509222009122003'; -- DEVINA SEPTIYARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00566/131/147/2016' WHERE `cnip` = '198207042001121001'; -- DONY CAHYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04201/185/657/2020' WHERE `cnip` = '197806142002122001'; -- ETIK TRI LUKIANTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01490/131/494/2017' WHERE `cnip` = '198401012008122004'; -- IKA RISTIANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06579/131/957/2018' WHERE `cnip` = '197802112003122004'; -- NUNIK HIDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01494/131/098/2017' WHERE `cnip` = '196403071993031001'; -- RAWANTARIS AKADJAJA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07697/100/909/2018' WHERE `cnip` = '197711212010122001'; -- SISKA RAHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01492/131/506/2017' WHERE `cnip` = '198303102010122007'; -- SRI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03407/185/904/2020' WHERE `cnip` = '196603131989011001'; -- SURIP
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05781/045/211/2022' WHERE `cnip` = '197507212003121002'; -- AKBAR ELA HEKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01336/045/883/2016' WHERE `cnip` = '197404302000032001'; -- HIDAYATUL HASANAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01338/045/045/2016' WHERE `cnip` = '198101282002121002'; -- MUHAMMAD MURTAOLO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09201/191/042/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197803022000122001'; -- MUSLIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '197306292000031001'; -- RISWAN YUNIDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05772/045/091/2022' WHERE `cnip` = '198103262000032003'; -- ROOLLIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02723/185/004/2019' WHERE `cnip` = '197107051990031003'; -- SARIMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03840/045/925/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198605282008121003'; -- TOLIK KING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09756/045/877/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198009012005012001'; -- YULIASTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12195/187/268/2018' WHERE `cnip` = '197912122005011005'; -- FACHRUL RIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10750/003/603/2018' WHERE `cnip` = '198907022015042002'; -- JULIA ULFAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00543/003/842/2020' WHERE `cnip` = '198903082015042006'; -- MARSURIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09600/089/245/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198601162008122005'; -- MURSYIDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09602/089/747/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198302222005011003'; -- MUSRIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09609/089/554/2018' WHERE `cnip` = '198201222005012002'; -- NILAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08018/185/057/2020' WHERE `cnip` = '197911202009102002'; -- NURASMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '01-04466-1122', `cnosnt` = NULL WHERE `cnip` = '198803272015041001'; -- RIAL FAUZA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '0' WHERE `cnip` = '198004152005011001'; -- ADRIANUS AMHEKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00568/039/619/2017' WHERE `cnip` = '198104122008122002'; -- ANY INDRAWATI RATU DJAWA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02102/190/635/2019', `cnopnt` = NULL, `cnosnt` = 'SNT-07109/039/637/2022' WHERE `cnip` = '198501112005012001'; -- CORNELIA MARSINTHA NAOMI AMALO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09642/039/941/2021' WHERE `cnip` = '196503051990121001'; -- DARA RIDOLOF MIHA BALO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02107/190/690/2019' WHERE `cnip` = '198201142006042002'; -- INGRIT MARSELINA LOLOLAU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01854/039/038/2017' WHERE `cnip` = '197808162001122001'; -- LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06518/039/540/2018' WHERE `cnip` = '196501301992032001'; -- MARTINA HASINTA BUPU PAGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02015/039/358/2018' WHERE `cnip` = '198110302009122002'; -- NELLY ADRIANA LILY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00618/039/545/2018' WHERE `cnip` = '197902162001122001'; -- VERMIYATI KUSRITH MANALOR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06852/039/671/2018' WHERE `cnip` = '196204221990121001'; -- YUSAK MANAFE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08381/185/110/2020' WHERE `cnip` = '197603142009122002'; -- ANDI SURFI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00050/088/115/2018' WHERE `cnip` = '198309292009121009'; -- ANDI WINATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00097/088/026/2018' WHERE `cnip` = '198204242008012021'; -- BUNGA ROY APRILIYA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00057800/121/3005/114/2022' WHERE `cnip` = '197906062005011005'; -- CAHYO TRI WIJANARKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00154/088/050/2018' WHERE `cnip` = '198401252006042001'; -- EKA TRIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08960/185/853/2020' WHERE `cnip` = '198612012009122002'; -- EVA YANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00394/088/356/2018' WHERE `cnip` = '196608121990032002'; -- NASUROH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '111135646875898' WHERE `cnip` = '196009191986021001'; -- PURNOMO ANANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08945/185/996/2020' WHERE `cnip` = '197208021993032002'; -- RETNO ANDRIJANTI ESTININGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00236/088/681/2018' WHERE `cnip` = '196409251985032003'; -- ROSMIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01963/088/139/2018' WHERE `cnip` = '198804292009122004'; -- UMI WARDHATUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00663/088/675/2018', `cnosnt` = '00058945/121/3005/114/2022' WHERE `cnip` = '198007292005012004'; -- YULIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04655/185/410/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199312272019031018'; -- ALDINATA FAHREZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04773/185/571/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198212112015042001'; -- GIMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10235/185/641/2020', `cnopnt` = NULL, `cnosnt` = 'SNT-09938/047/649/2022' WHERE `cnip` = '198310132019031005'; -- MUHAMMAD ABDUL KADIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03060/047/979/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197909042014042001'; -- YAYI LUKITA ANA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '008398/PPK-C.SL.MOOC/PusdiklatPB' WHERE `cnip` = '198605102019031011'; -- AHMAD LUBIS GHOZALI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198806032018031001'; -- BOBI KHOERUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01219/024/943/2020', `cnosnt` = NULL WHERE `cnip` = '197109111999011001'; -- DUDI ABDURACHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06546/185/991/2020' WHERE `cnip` = '197703202009012004'; -- IDA NURAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02717/185/247/2019' WHERE `cnip` = '197201021999011001'; -- Marsono, S.AP.
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198507202019032015'; -- MUNENGSIH SARI BUNGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02676/185/391/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198607202019032008'; -- RINA FATIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00158/024/509/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196508241994031003'; -- SUHARNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05482/185/019/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198709242019031008'; -- ADITAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09307/185/569/2018', `cnopnt` = NULL WHERE `cnip` = '197912062010121001'; -- FAIDZIN FIRDHAUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06709/130/302/2018' WHERE `cnip` = '196906111993032005'; -- SITI MARKHATUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01750/130/203/2017' WHERE `cnip` = '196712061990031007'; -- SUGIWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03607/185/056/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199009202019032019'; -- WINDI ASTRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02861/191/157/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197112192014091003'; -- NURKHAKIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00864/414/808/2021' WHERE `cnip` = '196705281988121001'; -- SUDARMADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03167/185/627/2017' WHERE `cnip` = '196612101989122001'; -- Tiurma Manurung
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04576/185/932/2020', `dtgltbnt` = '2025-07-01', `dtglkbnt` = '2030-07-01', `dtglsertifikat` = '2025-07-01', `dtglkadaluarsa` = '2030-07-01' WHERE `cnip` = '197710042003122001'; -- UMMI FAIZAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-16738/032/675/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = NULL, `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197303122001122001'; -- YUSNALIN, S.S, M.M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02709/185/548/2019' WHERE `cnip` = '198510102009122005'; -- DITA RISA PERMATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00636/032/455/2017' WHERE `cnip` = '197602272005012001'; -- ERNI SULISTYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00645/032/265/2017' WHERE `cnip` = '198307312006042004'; -- FERONIKA WIJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00651/032/462/2017', `cnopnt` = NULL WHERE `cnip` = '198310022008122002'; -- FRINTA PRATAMASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00662/032/184/2017' WHERE `cnip` = '197808172005012001'; -- HAYU KUSUMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00709/032/616/2017' WHERE `cnip` = '198601292009122003'; -- KUSINDIANING WIJIARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00744/032/345/2017' WHERE `cnip` = '198304262009121002'; -- MOH. SHOLEH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00780/032/055/2017' WHERE `cnip` = '198410162009122006'; -- NUR AINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06648/032/494/2018' WHERE `cnip` = '197012222001122001'; -- RINING PUJAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02101/190/454/2019' WHERE `cnip` = '198501192014092002'; -- WATI ITARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00896/032/353/2017' WHERE `cnip` = '198307052010122003'; -- WYDIA YULIKE RIAMINDIASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13109/054/014/2018' WHERE `cnip` = '197708172001121001'; -- AGUSSALIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13110/054/916/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196901121990031003'; -- ALIMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08811/185/058/2020' WHERE `cnip` = '198401162008102001'; -- ERNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13119/054/485/2018' WHERE `cnip` = '198212012005012001'; -- HASNAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13126/054/143/2018' WHERE `cnip` = '197202282001121001'; -- MUHAMMAD RAFIQ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13133/054/091/2018' WHERE `cnip` = '198605102010122007'; -- RACHMADANI MUNIR
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '196707311993031001'; -- SIRAJUDDIN OMSA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13139/054/827/2018' WHERE `cnip` = '197501232001122001'; -- TANRIANGKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00015993/121/3005/114/2020', `cnosnt` = 'BNT-00015993/121/3005/114/2020' WHERE `cnip` = '197608172007101001'; -- AGUS MARWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07906/185/912/2020' WHERE `cnip` = '196705101994121001'; -- ANANG BASUKI WIDYAKUMARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08255/185/150/2020' WHERE `cnip` = '196606122007012001'; -- WAHYUNINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02851/185/956/2018' WHERE `cnip` = '197601232014091003'; -- WAHYU WIBAWA JANU KUSUMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06640/185/176/2019' WHERE `cnip` = '197205161999031003'; -- YEKTI BASUKI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11573/190/277/2018' WHERE `cnip` = '197307232014092001'; -- YULIANA SETIYARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11574/190/878/2018', `cnopnt` = NULL WHERE `cnip` = '197407192014092001'; -- YULISTIARINI KUMARANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04152/191/012/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199708152020122012'; -- ARNILA SARI BR SIJABAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04799/185/729/2020' WHERE `cnip` = '197709222011032001'; -- BADRIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00403/191/627/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199407242019031011'; -- BAYU NUR CAHYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199011162019032015'; -- CATRIN NOVRISTA HARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04145/191/244/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199312252019032030'; -- DESI INDAH PERMATA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04491/185/148/2020' WHERE `cnip` = '196703232008012001'; -- DIANAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02384/002/357/2018', `cnopnt` = NULL WHERE `cnip` = '198902042015041001'; -- EKO SUSILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11781/186/718/2018' WHERE `cnip` = '198501212009101001'; -- AHMAD IKBAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06639/185/464/2020' WHERE `cnip` = '198902052019031017'; -- FATHUROYAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12421/002/640/2018' WHERE `cnip` = '196312312007012037'; -- HARNISAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10770/002/245/2018' WHERE `cnip` = '197208142002122002'; -- INTAN MEUTIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10761/002/845/2018' WHERE `cnip` = '198301242009012005'; -- MEILIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06060/185/442/2020' WHERE `cnip` = '199003112015041003'; -- MUHAMMAD FAUZAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03771/002/448/2019' WHERE `cnip` = '196912062007012002'; -- MULYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12198/187/851/2018' WHERE `cnip` = '198902092015042002'; -- NURAINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03930/191/155/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198703122015042001'; -- NURAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00551/002/951/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196612312007012049'; -- NURHAYATI S.PD, M.PD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10762/002/896/2018' WHERE `cnip` = '198101082015041001'; -- R. AJA DWI SYUKRILLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02382/002/205/2018' WHERE `cnip` = '196412272000122001'; -- SA`ADAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05123/185/901/2020' WHERE `cnip` = '198105052008012004'; -- SANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05112/185/109/2020' WHERE `cnip` = '198307122008012001'; -- SRI FITRI ANGGRAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06072/185/525/2021', `cnosnt` = NULL WHERE `cnip` = '198001062014091001'; -- BUDIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10769/002/023/2018' WHERE `cnip` = '197906262015041001'; -- TOTO SUJATMIKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06071/185/344/2020' WHERE `cnip` = '197704232000122002'; -- VILLA SAFRIDEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04576/191/152/2023' WHERE `cnip` = '197407032007012027'; -- WARDIANA,S.HUT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05029/185/476/2020' WHERE `cnip` = '196610102007012002'; -- YARIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04141/191/780/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '195808161986031005'; -- ZAINUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09303/185/205/2018' WHERE `cnip` = '198304252014041001'; -- JOKO SUSILO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04149/185/718/2018', `cnosnt` = 'SNT-05490/01 5n 1912022' WHERE `cnip` = '198502112015042002'; -- AYU PERMATASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07392/015/461/2019' WHERE `cnip` = '198606132015042002'; -- FITRIA ASMARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02161/188/190/2019' WHERE `cnip` = '198012192014041001'; -- IKSANDER
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198303092015041001'; -- KUNCORO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198708192014041001'; -- NANANG WAHYUDIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '199109032014041002'; -- SEPTIAN AZMIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02160/188/609/2019', `cnopnt` = '-' WHERE `cnip` = '198304292015041002'; -- SINGGIH APRIYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05691/185/611/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198603182014041001'; -- ADITYA PERDANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09606/087/411/2023', `cnosnt` = NULL WHERE `cnip` = '197604252000031001'; -- AHIRUDIN DEREK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06081/185/015/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198004082008101003'; -- ALI PURWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05499/185/147/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197610161999032002'; -- DETY YUSMARWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06089/185/953/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197811022001122001'; -- E.ADY HENDRIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08089/191/255/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197610172014091002'; -- EKO SUPRIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04346/191/967/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198104062010122001'; -- FARAH BADRIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03569/087/263/2023', `cnosnt` = NULL WHERE `cnip` = '197504152000122001'; -- FENY DARUNY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04154/185/684/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197702192003122009'; -- HAPPY NINGDYAH NADHI HAPSARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07751/191/880/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198208282014091004'; -- HARIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06096/185/311/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198804212014042002'; -- KARTINI MUSTIKA PENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06101/185/548/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197308251999031010'; -- MARINO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05561/087/347/2022', `cnosnt` = NULL WHERE `cnip` = '197803052005011004'; -- MUHAMAD SUNANDAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07750/191/449/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197709102014092003'; -- MUNNIROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04318/191/246/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197912032010122001'; -- MURNIE ASTUTIE WIDYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05575/185/552/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198411012010122006'; -- NOVITA LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04133/185/951/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198804272014042001'; -- NUNGKY SAFITRI PUSPITASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02158/188/056/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198712022014042001'; -- NURLAILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02162/188/851/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198512022010121002'; -- NURUL HADIE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04344/191/995/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196912292005012002'; -- RINI SUMARYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09304/191/706/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198405282005012001'; -- SUCI PRAMADANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06125/185/004/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198206132014092002'; -- SUKARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04146/191/645/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197007112005011001'; -- MUHAMAD YANI NGANGUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08514/185/398/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903132008012014'; -- RISKAH ANDALINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01598/084/653/2017' WHERE `cnip` = '198205102008012013'; -- W.I. ETTA FARNEUBUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01336/022/453/2017' WHERE `cnip` = '197709012009102001'; -- ERVINA NUZLYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03765/185/181/2020' WHERE `cnip` = '197609262007102001'; -- HERNI TRI SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09018/185/558/2018', `cnosnt` = NULL WHERE `cnip` = '198508312009122005'; -- NINA AGUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04057/185/196/2020' WHERE `cnip` = '198809152010122004'; -- RIKA KARISMA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-04181/426/714/2022' WHERE `cnip` = '196604101990101001'; -- ASKARI KUMAAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04788/185/347/2018' WHERE `cnip` = '197812052003122002'; -- DEESY KATRIANI LONTAAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04803/185/465/2018' WHERE `cnip` = '197810082000032001'; -- OLHA RUT BAMBULU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02686/191/992/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197610142000032001'; -- RUTH ESTHER LAHAWIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00997/049/205/2017' WHERE `cnip` = '196904121990112001'; -- SELVIE TAMON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04248/426/508/2022', `cnosnt` = NULL WHERE `cnip` = '196312301989032001'; -- SUSY AMELIA MARENTEK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10112/049/125/2019' WHERE `cnip` = '196706022000122001'; -- TERINA KATUUK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04167/049/928/2022', `cnosnt` = NULL WHERE `cnip` = '197003091990111001'; -- TONY ALALINTI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00022799/121/3005/114/2023' WHERE `cnip` = '197907112008121001'; -- YOHANIS RONGKONUSA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05795/087/886/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198510312015041003'; -- HAMDANI SALEH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10657/120/539/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198802072015042005'; -- LINDA FATMAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03438/185/048/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199405112019031009'; -- MUHAMMAD HANIF AZRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08162/185/297/2018' WHERE `cnip` = '198804202015041003'; -- RAHMAD AKMAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01710/120/709/2017', `cnopnt` = 'PNT-01266/117/705/2021', `cnosnt` = NULL WHERE `cnip` = '198206102014041001'; -- SELAMAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03602/185/321/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199505042019032027'; -- TIARA NOVA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01277/191/257/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '198501172008102001'; -- WILLASARI KREISTIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '02301/038/216/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197110212002121001'; -- AHMAD SULTHON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07989/185/713/2020' WHERE `cnip` = '197709132005011003'; -- ANANTO ANDY ARIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07944/185/314/2020' WHERE `cnip` = '197210031992031001'; -- ANGKA SARTONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02310/038/46/2017' WHERE `cnip` = '198005102002122001'; -- BAIQ MEGAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10252/185/340/2020' WHERE `cnip` = '197908272009122003'; -- DIANA AGUSETYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02300/038/245/2017' WHERE `cnip` = '197307052000032001'; -- DIAN PRAMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02308/038/243/2017' WHERE `cnip` = '198208222008012013'; -- D PUSPA LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07933/185/152/2020' WHERE `cnip` = '197109042014091001'; -- ERA SAKTI AKBAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10238/185/694/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198704162015041001'; -- IMAM WAHYUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02306/038/691/2017' WHERE `cnip` = '197803082008012014'; -- ISTIQOMAH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '197703032003121001'; -- KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02321/038/948/2017' WHERE `cnip` = '197304052008101001'; -- MUJIBURRAHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10284/185/745/2020' WHERE `cnip` = '198303122009121007'; -- MUNAWIR ALI SUBAIDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07917/185/144/2020' WHERE `cnip` = '196812311992032003'; -- MURNIASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10297/185/849/2020' WHERE `cnip` = '198311142009122003'; -- MURNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06726/185/311/2020' WHERE `cnip` = '197209052001122001'; -- ASRA HAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12192/187/645/2018' WHERE `cnip` = '198701282010122004'; -- DELIA FADILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05949/185/347/2020' WHERE `cnip` = '198605132010122004'; -- DEVITA SRI YANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00124/010/147/2018' WHERE `cnip` = '198707092010122006'; -- DEVI YENITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06293/010/140/2018' WHERE `cnip` = '198307032008121002'; -- DODI KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00151/010/557/2018' WHERE `cnip` = '198304282009122003'; -- EFRIDAWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06131/185/751/2020' WHERE `cnip` = '197205302005012002'; -- ERNITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08099/010/866/2018' WHERE `cnip` = '198308182010121002'; -- FACHRUL ROZI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00191/010/061/2018' WHERE `cnip` = '198504302008012001'; -- FENY RAHMI PUTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-13232/010/881/2018' WHERE `cnip` = '198004152001122001'; -- HERDA SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12196/187/599/2018' WHERE `cnip` = '198901162010122006'; -- INGGIA LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00268/010/896/2018' WHERE `cnip` = '198205212006042003'; -- ISRA MEILDA AGUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00288/010/308/2018' WHERE `cnip` = '197407142008101002'; -- JON ASLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06491/010/730/2018' WHERE `cnip` = '198310232009122005'; -- LIA WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00364/010/943/2018' WHERE `cnip` = '197908142002122002'; -- MIRA GUSNIWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12197/187/440/2018' WHERE `cnip` = '198812232015041002'; -- MUHAMMAD IQBAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06008/185/854/2020' WHERE `cnip` = '198304302008102001'; -- NILA ARIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06187/185/872/2020' WHERE `cnip` = '198804262009121004'; -- PUTRA ANDRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06293/185/890/2020' WHERE `cnip` = '198501312006042001'; -- RENO SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09418/059/012/2018' WHERE `cnip` = '197703122011012011'; -- ANDI WAHIDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09514/059/689/2018' WHERE `cnip` = '198310132010012024'; -- ANDRIANI RUSDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01646/191/447/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198611262015042001'; -- MASNA MULIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06631/185/216/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199102282014042001'; -- ANIS ANISAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05137/185/716/2020', `cnopnt` = NULL WHERE `cnip` = '197303042008011004'; -- ARIP MOH BAHTIAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00636/025/615/2020', `cnopnt` = NULL WHERE `cnip` = '198801272015042002'; -- ASTRIE MUTIASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00635/025/744/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197911092006042004'; -- DELI DAHLIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00638/025/057/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198011282006042005'; -- ELA SUSILAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04152/185/112/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197404242007011016'; -- KUNKUN KURMANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09178/025/235/2022', `cnosnt` = NULL WHERE `cnip` = '197512252009012003'; -- LINA MARLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00634/025/653/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198811172015042002'; -- NOVIANTY MAESYAROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '00559/025/799/2020', `cnosnt` = NULL WHERE `cnip` = '196206301992021001'; -- NUNDANG BUSAERI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00529/025/096/2020' WHERE `cnip` = '198807162015041008'; -- RIAN HEDIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01654/191/806/2022' WHERE `cnip` = '198803182015042003'; -- SARI HARUMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04136/185/304/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198507122015042004'; -- SUNDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04137/185/505/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198212022015041001'; -- SURYA RUSWANDIF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00641/025/881/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198808042010011001'; -- ZAKI ALFUADI FADLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04242/185/642/2017' WHERE `cnip` = '196601031989032001'; -- DIANA HERTATI             DRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04245/185/345/2017' WHERE `cnip` = '197001141990031001'; -- DWI RACHMAT SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04253/185/154/2017' WHERE `cnip` = '196111201987032001'; -- EC NINIEK IMANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04249/185/039/2017' WHERE `cnip` = '196808171991032001'; -- LILIK AGUS SETIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04250/185/931/2017' WHERE `cnip` = '196612221990032001'; -- LINA ERYASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04251/185/542/2017' WHERE `cnip` = '196902081994032001'; -- MINARNI NUR TRILITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04252/185/053/2017' WHERE `cnip` = '195801241987032001'; -- NINIEK ANGGRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04255/185/156/2017' WHERE `cnip` = '196611161990032001'; -- NURUL KOMARIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04256/185/557/2017' WHERE `cnip` = '197011151991032002'; -- NURUL SYARIAH SETIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04257/185/958/2017', `cnosnt` = NULL WHERE `cnip` = '197309281994032001'; -- NURUL WARDANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04254/185/455/2017', `cnopnt` = NULL WHERE `cnip` = '196508141991032001'; -- NURYANTI TAKARINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04258/185/079/2017' WHERE `cnip` = '197008051991032001'; -- PURWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06729/191/494/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199609192019032019'; -- RENGGANIS ANJANI SEPTYAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04259/185/790/2017' WHERE `cnip` = '197009291991032001'; -- ROCHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04260/185/202/2017' WHERE `cnip` = '196001051993032001'; -- SITI ZAINAB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04261/185/503/2017' WHERE `cnip` = '196201061990032001'; -- SRI WIDAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04262/185/304/2017' WHERE `cnip` = '197406151994031001'; -- SUGENG RIYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04263/185/505/2017' WHERE `cnip` = '196812081991032001'; -- SUPRIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04264/185/806/2017' WHERE `cnip` = '197104061991032001'; -- SUWATIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06138/011/318/2018' WHERE `cnip` = '197804162001121002'; -- AFRIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07831/191/119/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198604212006041003'; -- ALEX SANDER
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05292/185/418/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199007262014041001'; -- ARIF ADE PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00214/011/357/2017' WHERE `cnip` = '197810252006042002'; -- ELVA SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00097/011/356/2017', `cnosnt` = 'SNT-10737/011/358/2021' WHERE `cnip` = '197004202005012002'; -- NENENG NUR HARAPAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03300/191/456/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198405252008122005'; -- NILA NOFRITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00387/011/408/2017' WHERE `cnip` = '198011042006042003'; -- SARI ANGGRAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06894/185/407/2019' WHERE `cnip` = '198707112014042001'; -- SHINTA SIRVIA ROZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05095/185/179/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198111192008012008'; -- YESI NOVIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02599/047/915/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199008112019032016'; -- ANNISA MAWADDAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05788/087/398/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199504142019031009'; -- IRFAN APRISON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02148/047/675/2017', `cnosnt` = '00002351/121/3005/114/2019' WHERE `cnip` = '198910082015042002'; -- PUTRI SEKAR WILIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02177/185/397/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199111292019032017'; -- RIA PUJI VIOLETA HUTABARAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03850/191/356/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199401092019031011'; -- EFENDY BATTI`
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10255/185/293/2020' WHERE `cnip` = '199007152019031012'; -- RAJA FRANS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08938/185/998/2020' WHERE `cnip` = '199206202019031014'; -- RIAWAN INDRA P.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06715/026/309/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197512172005011002'; -- SOLEH ADI WALUYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00563/026/404/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197810082005011002'; -- SUPRIATNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03030/026/556/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408232006042001'; -- WIWIK MARGIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00895/026/552/2017' WHERE `cnip` = '198610192010122005'; -- WURI ERWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07072/185/106/2019' WHERE `cnip` = '198804292015042002'; -- SYAYYIDAH ALIFAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07069/185/752/2019' WHERE `cnip` = '198002162008101001'; -- WAKIRAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07068/185/871/2019' WHERE `cnip` = '198904252014041001'; -- YASIR MUBAROK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07076/185/470/2019' WHERE `cnip` = '198707022015042002'; -- YULIANA HARRY RAHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01841/185/204/2021' WHERE `cnip` = '197304262007012002'; -- SRI MULIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01845/185/328/2021' WHERE `cnip` = '197909172009102002'; -- T P HARMAH M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02901/185/072/2021' WHERE `cnip` = '197308022008102001'; -- YULIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05783/185/273/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197606032008122001'; -- YUNIARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04757/185/893/2018' WHERE `cnip` = '198403122010122003'; -- RIRIN WIDYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04758/185/494/2018' WHERE `cnip` = '197907012008012019'; -- RISKI ARIFIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04243/032/293/2019' WHERE `cnip` = '197612152005012001'; -- ROCHMAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11778/190/604/2018' WHERE `cnip` = '197501302002122001'; -- SRI MUDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04759/185/805/2018' WHERE `cnip` = '196801122007011005'; -- SUGENG SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04760/185/507/2018' WHERE `cnip` = '196309161986031003'; -- SUNARYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04761/185/408/2018' WHERE `cnip` = '196609211993032001'; -- SUSMIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04762/185/809/2018' WHERE `cnip` = '197008212014092002'; -- SUTJI SUWARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03003/032/906/2020' WHERE `cnip` = '197902102005011003'; -- SYAIFUL ANWAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04763/185/020/2018' WHERE `cnip` = '198201272008102001'; -- TRI KANTI RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05792/087/623/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197601202000121001'; -- TUTUT BOEDYO WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04764/185/521/2018' WHERE `cnip` = '198604072014042001'; -- TUTUT WIDYANINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04765/185/152/2018' WHERE `cnip` = '198302172010122005'; -- WAHYUNI HIDAYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07542/193/558/2019' WHERE `cnip` = '196707232014092001'; -- WIDHI WIDAYATI RIYANTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04766/185/353/2018' WHERE `cnip` = '197909172009102001'; -- WIWID NURACHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04767/185/854/2018' WHERE `cnip` = '197003262007012001'; -- WIWIK WINDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06998/193/472/2018' WHERE `cnip` = '198501282009121003'; -- YONATAN PASSAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11780/190/877/2018' WHERE `cnip` = '197803282010121001'; -- YUSUF FAHRUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04768/185/075/2018' WHERE `cnip` = '197707092008102001'; -- YUYUN ETASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08414/185/797/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198801282010121008'; -- RIZQI MAULANA KUSUMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09588/440/370/2026', `dtgltpnt` = '2026-07-21', `dtglkpnt` = '2031-07-21', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-21', `dtglkadaluarsa` = '2031-07-21' WHERE `cnip` = '197409212010121001'; -- AGUS MOCHAMAD RAMDHAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07121/185/211/2019' WHERE `cnip` = '198010122010122001'; -- ANNA MARIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02549/022/440/2018' WHERE `cnip` = '197101142014092001'; -- DEWI MASRIDAHYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02553/022/655/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197908202010122003'; -- EVI DAMAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08652/185/191/2020' WHERE `cnip` = '197211281994032001'; -- INE MULIYASYARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02212/191/457/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198304092008122004'; -- NORMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06587/051/556/2018' WHERE `cnip` = '198005022009102002'; -- NURLELA SADU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08352/185/998/2020' WHERE `cnip` = '197007052007012001'; -- RAMAYULIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06656/051/493/2018' WHERE `cnip` = '196807212006042002'; -- RISWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08394/185/594/2020' WHERE `cnip` = '197411112008102001'; -- ROSMINARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08613/185/808/2020' WHERE `cnip` = '198005052009102005'; -- SAPIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08595/185/907/2020' WHERE `cnip` = '198108112006042001'; -- SHOPHIA MAHARDIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02845/185/909/2018' WHERE `cnip` = '197706182006042001'; -- SITTI MUNIFAH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '041242334895865' WHERE `cnip` = '196311171991031001'; -- SUKRAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08656/185/505/2020' WHERE `cnip` = '197303022007102001'; -- SYAHRAINI MUIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08615/185/700/2020' WHERE `cnip` = '197909112007012002'; -- SYAMSIAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00017133/121/3005/114/2022', `cnosnt` = '1820/UN28/KU/2022' WHERE `cnip` = '197304062002121001'; -- TASWIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04535/191/957/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198205042015042003'; -- ERADIS EDITA NAFANU
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197209292005012001'; -- MARGARETHA LAGA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '198005242005011003'; -- MAXIMUS BRIA FOREK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01600/191/847/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198705262015042005'; -- MERYATI MELANITA ANIN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197302232005011001'; -- PETRUS DAMIANUS ONI OETPAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06895/185/898/2019' WHERE `cnip` = '198512022015042001'; -- REGINA ULUK BIKOLO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00312/172/895/2016' WHERE `cnip` = '197809132005012001'; -- ROSA DELIMA MANO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05477/172/273/2019' WHERE `cnip` = '198201012014042001'; -- YEANE SRICAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10304/185/678/2020' WHERE `cnip` = '197908022005012001'; -- YOANETTA TALAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02828/185/440/2018' WHERE `cnip` = '196907021993011002'; -- DEDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10102/086/574/2019' WHERE `cnip` = '197407161999031003'; -- GUN GUN GUMILAR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '061244597937942' WHERE `cnip` = '198401132008121002'; -- JAJA MUHAMMAD ZAKARIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06783/185/894/2020' WHERE `cnip` = '198406192019031006'; -- RAMA DEKA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07457/085/603/2022', `cnosnt` = 'SNT-04141/085/600/2022' WHERE `cnip` = '196907041996032001'; -- SITI MUZAYANAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02850/185/525/2018', `cnopnt` = NULL WHERE `cnip` = '196604181986021002'; -- TOTO SUHARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00405/185/629/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199507232019032021'; -- TYAS MAWARNI RISTANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04142/185/351/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197606221999032003'; -- WIDA SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06511/185/743/2020' WHERE `cnip` = '198508152008012002'; -- DHIAN SHINTA PRAMUDITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02294/030/957/2017' WHERE `cnip` = '198412132006041002'; -- EDY SUPIYARTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04895/185/056/2020' WHERE `cnip` = '198611132008012001'; -- NOVIANTI WAHYU ANDARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '196507031993032003'; -- R A ESTI HAPSARI SAPTIASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02721/185/892/2019' WHERE `cnip` = '197808052010122002'; -- ROSMINI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01566/030/508/2020' WHERE `cnip` = '196901181995031003'; -- SETYANTO PUTRO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-01564/030/806/2020' WHERE `cnip` = '196505201986011001'; -- SISWANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08165/185/400/2018' WHERE `cnip` = '198603072009122004'; -- SUCI ROSULIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02098/190/209/2019' WHERE `cnip` = '198112192009102001'; -- SUGIYARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03294/185/208/2020' WHERE `cnip` = '197611252005011001'; -- SUPRIHATIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02293/030/126/2017' WHERE `cnip` = '198207222009122006'; -- TRI WAHYUNI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '196707151989021001'; -- WIJONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12219/190/255/2018' WHERE `cnip` = '198208132005012001'; -- WINARSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03389/191/673/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197203312006041002'; -- YOHANES BUDI SURYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '00031/191/114/2024' WHERE `cnip` = '199006062019031021'; -- ANDHIKA KUSUMA WARDHANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02717/185/917/2021', `cnosnt` = NULL WHERE `cnip` = '199705082019032003'; -- ARVIARRY MEYRIFARA WIDYARJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04282/185/746/2021' WHERE `cnip` = '199003232019032019'; -- MARTCILIA WIDYA PRATAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06671/185/500/2020' WHERE `cnip` = '196312211992031001'; -- SUCIPTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07980/185/704/2020' WHERE `cnip` = '197612012007102001'; -- SRI MURTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07248/185/001/2020', `cnosnt` = NULL WHERE `cnip` = '196802221989032002'; -- SUNARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12217/190/203/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198905282015042003'; -- SUTAN NUR MEYLIANA EKAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07249/185/002/2020' WHERE `cnip` = '197212171994032001'; -- SUWARNI WIDYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07243/185/006/2020' WHERE `cnip` = '196606111987031002'; -- SUYUD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07306/185/226/2020' WHERE `cnip` = '196412271986032002'; -- TRI SISWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07288/185/425/2020' WHERE `cnip` = '198011042008101001'; -- TYAS KUSUMAH ADMAJA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07223/185/954/2020' WHERE `cnip` = '196709161990032002'; -- WIDAYANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05100/087/876/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198401052008011002'; -- YANUAR RADITYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08152/185/616/2020' WHERE `cnip` = '198907022019031016'; -- ADIGUNA DWIRUSANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00542/185/911/2021', `cnosnt` = NULL WHERE `cnip` = '197208072001121001'; -- ADRIANUR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08055/185/748/2020' WHERE `cnip` = '198203222006041001'; -- DONNI YUDHA PRAWIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08023/185/443/2020' WHERE `cnip` = '198007092009102001'; -- DYAH PUSPA NINGRUM PARINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT.00545/185/354/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197107172006042001'; -- ERLINA PUTRI BR BARUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08131/185/463/2020' WHERE `cnip` = '198705042014042001'; -- FITRIA ZULMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07974/185/687/2020' WHERE `cnip` = '197608142008102001'; -- HAFIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00593/185/987/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199008112015041003'; -- HENDRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07136/185/987/2019' WHERE `cnip` = '198910292015041001'; -- HERY AKHWAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197208142005011001'; -- ISMED ISKANDAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01372/004/133/2016' WHERE `cnip` = '197207052006042001'; -- LELI LINDAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06026/004/134/2019' WHERE `cnip` = '198201282010122003'; -- LIA FATHMAWATY HARAHAP
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '196303211988032002'; -- MARTINA RESTUATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '051004708562930', `cnosnt` = NULL WHERE `cnip` = '196509161991031001'; -- MUSLIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06025/004/993/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198811012015041001'; -- RAZAQ MAHARA ARLY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08173/185/709/2020' WHERE `cnip` = '199203212014042002'; -- SELVIA INCA DEVI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01360/004/700/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198106202009122003'; -- SHOHIFAH GULTOM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '021603474016660', `cnosnt` = '-' WHERE `cnip` = '198109192006041002'; -- WINSYAH PUTRA RITONGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08067/185/771/2020' WHERE `cnip` = '198303212010122003'; -- YESSI ADRIANI TAMPUBOLON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08940/185/411/2020', `cnopnt` = 'PNT-09935/003/416/2023', `cnosnt` = 'SNT-02891/003/410/2023' WHERE `cnip` = '199408122019031011'; -- ANDRI GUNANDAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10752/003/765/2018' WHERE `cnip` = '197205302007011002'; -- FAISAL AD
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '072000900050142', `cnosnt` = NULL WHERE `cnip` = '198711052019031011'; -- HAIMI ARDIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09647/185/716/2020' WHERE `cnip` = '199010252019032016'; -- KASMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04301/191/798/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198506082019031006'; -- RIDHA AMINULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00131/026/615/2017' WHERE `cnip` = '197308172001121003'; -- ARIS NURYOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '00' WHERE `cnip` = '199012072019031016'; -- BAYU HIMANDOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-', `cnopnt` = '-', `cnosnt` = '-' WHERE `cnip` = '197409282000032001'; -- ENI DWI WARDIHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00286/026/456/2017' WHERE `cnip` = '198311102008122002'; -- ETTY PUJIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197201021999031001'; -- HERY PURNOMO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '196404141990031002'; -- KARNOWAHADI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01065/026/142/2021' WHERE `cnip` = '196912302001121001'; -- MARSUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03633/026/495/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197107271995012001'; -- RR.RATNA NUSWANTARI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01061/026/008/2021' WHERE `cnip` = '196202191990031001'; -- SANIMAN WIDODO
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-00998/026/406/2021' WHERE `cnip` = '197706132000031002'; -- SUPANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01035/026/509/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197306182000032001'; -- SUYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00137/026/821/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197312141999032003'; -- TIAS MINTANING LESTARIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00865/026/8392016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197709232001122001'; -- UTAMI SULISTYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04120/185/617/2018', `cnopnt` = NULL WHERE `cnip` = '198901172014041001'; -- ADI HARYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02435/020/614/2020' WHERE `cnip` = '198401122015041001'; -- AHMAD KHOIRUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00806/191/114/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110102014091004'; -- ANDE MASUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00750/185/112/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199210092015042002'; -- ANDHITA DIANPONTI PUTRI KURNIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02437/020/716/2020' WHERE `cnip` = '197105132006041007'; -- ASNAWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02439/020/448/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198012122014091001'; -- DADANG SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06308/020/347/2019' WHERE `cnip` = '198309302014092002'; -- DEDEH KOMARIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09325/191/249/2023', `cnopnt` = '-', `cnosnt` = '-' WHERE `cnip` = '198402082015041001'; -- DICKY WIBIKSANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02524/020/753/2018' WHERE `cnip` = '198403112006042002'; -- EEN MARDIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01071/185/259/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197604052008102001'; -- ENDRA SETYANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00186/020/265/2018' WHERE `cnip` = '198604042008122004'; -- FATHIMATUL MAHDIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00000307/120/3005/114/2023', `cnopnt` = '-', `cnosnt` = '-' WHERE `cnip` = '198204152010122004'; -- FITRIA ASTUTIE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02525/020/784/2018' WHERE `cnip` = '198402122009122004'; -- HANA DWI TRUSTIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02528/020/287/2018', `cnopnt` = NULL WHERE `cnip` = '197810062001122001'; -- HUSNIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00242/020/098/2018' WHERE `cnip` = '197804102005011002'; -- IIP ARIF BUDIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '198110292015042001'; -- IIP SUMIARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02526/020/095/2018' WHERE `cnip` = '197409282008102002'; -- IROH NADIROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '10683/020/698/2022', `cnosnt` = NULL WHERE `cnip` = '197011252005011002'; -- ITO SUMITRO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02838/185/641/2018' WHERE `cnip` = '198701282010121003'; -- MUHAMMAD ALFIAN EL HIDAYAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '10869/020/344/2022', `cnosnt` = NULL WHERE `cnip` = '198405062008011005'; -- MUHRIJI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02451/020/552/2020' WHERE `cnip` = '198504172014092002'; -- NIA DARUNIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02455/020/696/2020' WHERE `cnip` = '197701012003122002'; -- RT. KOMARIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04161/185/202/2018' WHERE `cnip` = '197607202006041004'; -- SIBLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01281/191/302/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198105092014091001'; -- SUBUR PERMANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02459/020/100/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197705022010122004'; -- SULASTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08469/185/827/2020' WHERE `cnip` = '198302142015042001'; -- TRIAS PRIHARDINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00605/020/421/2018' WHERE `cnip` = '198001052008101001'; -- TUBAGUS MAHFUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06891/185/154/2019' WHERE `cnip` = '198006072014091001'; -- WANDI KUSUMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02463/020/155/2020' WHERE `cnip` = '197303171992032008'; -- WITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02855/185/170/2018', `cnopnt` = '00003/020/173/2023', `cnosnt` = NULL WHERE `cnip` = '198207042008102001'; -- YULIANINGSIH
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01927/129/479/2020' WHERE `cnip` = '197709102009121001'; -- GEDE SUPRIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08644/185/592/2020' WHERE `cnip` = '198309142010121002'; -- IDA BAGUS NGURAH SIDHARTA MANUABA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02701/419/640/2021' WHERE `cnip` = '196503201990031002'; -- I GEDE NURJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08607/185/591/2020' WHERE `cnip` = '198305112006042001'; -- I GUSTI AYU SUNDARI MEYANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02672/419/547/2021' WHERE `cnip` = '196212311987031020'; -- I GUSTI LANANG WIRATMA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02667/419/341/2021' WHERE `cnip` = '196012311986011003'; -- I GUSTI NGURAH PUJAWAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02650/419/543/2021' WHERE `cnip` = '196212311988031018'; -- I MADE PAGEH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08608/185/692/2020' WHERE `cnip` = '198507242010121007'; -- I MADE SURAWIJAYA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02669/419/193/2021' WHERE `cnip` = '197008152001121002'; -- I PUTU GEDE DIATMIKA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02671/419/746/2021' WHERE `cnip` = '197309262001121001'; -- I WAYAN ARTANAYASA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02721/419/592/2021' WHERE `cnip` = '198507052010121007'; -- I WAYAN WIDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0275/2.2.0.0.2/03/03/2010' WHERE `cnip` = '198412202008012005'; -- KADEK SWANDEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08343/185/818/2020' WHERE `cnip` = '198304212009122005'; -- KARTINI DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08991/132/617/2019' WHERE `cnip` = '198102052010122001'; -- KETUT EVI HARTAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08587/185/918/2020' WHERE `cnip` = '198406152010122004'; -- KETUT VIERA YUNISTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10301/185/615/2020' WHERE `cnip` = '197911082010122001'; -- KETUT WIDIASTITI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02679/129/244/2021' WHERE `cnip` = '197603152001121002'; -- KOMANG SETEMEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08588/185/439/2020' WHERE `cnip` = '197806212009122001'; -- LUH BUDIASTITI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02837/185/030/2018' WHERE `cnip` = '198105242009122002'; -- LUH SERIADNYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10243/185/140/2020' WHERE `cnip` = '198004272002122001'; -- MADE ARI ASTRINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02839/185/942/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198408272015042002'; -- MADE HENY SAWITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08610/185/845/2020' WHERE `cnip` = '198605272010122003'; -- MAHAYU TEJA CANDRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01766/132/150/2017' WHERE `cnip` = '198211092003122001'; -- NI KADEK SUCIPTAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02668/419/12/2021' WHERE `cnip` = '197502252005012001'; -- NI LUH KADEK ALIT ARSANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02704/419/853/2021' WHERE `cnip` = '196312061990112001'; -- NI LUH WAYAN YASMIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08936/132/056/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198111182005012001'; -- NI NYOMAN BUDIARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08071/185/356/2020' WHERE `cnip` = '198307142005012002'; -- NI NYOMAN SRI SUPADMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08628/185/254/2020' WHERE `cnip` = '198503152005012001'; -- NI NYOMAN WAHYU SUMARDENI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-02642/419/054/2021' WHERE `cnip` = '197204162003121002'; -- NYOMAN MARJAYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01767/132/471/2017' WHERE `cnip` = '198604062008011001'; -- PUTU JONI SAPUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08594/185/006/2020' WHERE `cnip` = '197207132006042001'; -- SAININA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02077/039/216/2023', `cnosnt` = NULL WHERE `cnip` = '196612071987011001'; -- AMBROSIUS LEWORUA ENAY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04135/191/213/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196905111992032001'; -- ANA THERESIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05264/191/817/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197804182008011015'; -- APRI ALSON SANU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04906/191/249/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198312172010122004'; -- DESI ERLIN WELKIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08048/185/140/2020' WHERE `cnip` = '198112272014042003'; -- DESVIA MERI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05168/191/050/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198212162010121006'; -- ERASTUS DOMINGGUS BENU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04139/191/257/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198105172010012018'; -- ERNY ANABIRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04148/191/567/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198412282014041002'; -- FERDINAND UMBU REDA ANABOENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08043/185/675/2020' WHERE `cnip` = '198108182008011011'; -- GUSTAF RIDOLOF SAUDILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04914/191/788/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196906151990032001'; -- HANA MARIA LUSI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05174/191/787/2022', `cnopnt` = 'BNT-05174/191/787/2022' WHERE `cnip` = '198302222003121002'; -- HENDRA ALEXANDER FRANS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04916/191/890/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198403032014042001'; -- IDA AYU MADE WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02100/190/593/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198512092014042001'; -- IDA DINA APULIA TELNONI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02097/190/098/2019' WHERE `cnip` = '198801122010012023'; -- IKE MARGARETH IRAWATI LANGKE
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05791/087/212/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198005182009121003'; -- JEFVERTSON PETREX LOLANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04140/191/819/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197601312008101002'; -- JEMRI NATONIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08045/185/247/2020' WHERE `cnip` = '198109132010122002'; -- MARGARITA TEFBANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-10526/039/844/2022' WHERE `cnip` = '198003072008012011'; -- MARLINDA ELISABETH TALLO MANAFE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04903/191/246/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197603242005012002'; -- MARLINTJE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03130/039/547/2023', `cnosnt` = NULL WHERE `cnip` = '197312112001122001'; -- MARYLIN SUSANTI JUNIAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00356/039/444/2018', `cnopnt` = 'PNT-00806/039/444/2023', `cnosnt` = NULL WHERE `cnip` = '198409122008012006'; -- MAYA STEVANI SULU BUMBUNGAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04052/039/241/2023' WHERE `cnip` = '196702251992031001'; -- PAUL GABRIEL TAMELAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09019/185/779/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198102242000031001'; -- PELIPUS UNENOR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04155/191/175/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198307122010122001'; -- PORO JULITA HADU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04149/191/198/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197904102010122002'; -- RAMBU DESI BORU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07379/039/896/2022', `cnosnt` = NULL WHERE `cnip` = '197904172008041003'; -- RIDWAN HAMAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05497/191/905/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197909292008012027'; -- SERLIN SELFIANA IDJE DOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02050/039/397/2023', `cnosnt` = NULL WHERE `cnip` = '196504171992031002'; -- SUNADJI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08103/185/522/2020' WHERE `cnip` = '198507232010122002'; -- TUTI JULIANA NENOBAIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04124/191/341/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197408132000122001'; -- VEMY LEONITA IMELDA ADOE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04933/191/979/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197812082008011006'; -- YAKOBUS ASA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07125/185/915/2019' WHERE `cnip` = '198302062014091001'; -- AMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02767/042/512/2021', `cnosnt` = NULL WHERE `cnip` = '196910181991032001'; -- ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02749/042162212021', `cnosnt` = NULL WHERE `cnip` = '197602102005011002'; -- BASTIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02328/042/645/2017' WHERE `cnip` = '198008282005012003'; -- DELLY MASYITHAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02359/042/549/2017' WHERE `cnip` = '198609202010122001'; -- DEWI SALIMA KOMALA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02364/042/355/2017' WHERE `cnip` = '197711072008101001'; -- EKO HARTONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02333/042/551/2017', `cnopnt` = 'PNT-02615/042/554/2021', `cnosnt` = NULL WHERE `cnip` = '197906122006041001'; -- EKO WAHYUDI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02689/415/255/2021', `cnosnt` = 'PNT-02689/415/255/2021' WHERE `cnip` = '196803052014091004'; -- ENDANG KUSDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02326/042/553/2017' WHERE `cnip` = '197705152007102002'; -- ENY PURWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04791/185/351/2018' WHERE `cnip` = '198110212008012008'; -- ERVINA INDRIATI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-02613/042/862/2021' WHERE `cnip` = '197011271994031001'; -- FAHRIZAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02752/042/646/2021', `cnosnt` = NULL WHERE `cnip` = '197011161996012001'; -- FARAH DIBA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02632/042/463/2021', `cnosnt` = NULL WHERE `cnip` = '197503272009102001'; -- FARA JUSMANIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02325/042/782/2017' WHERE `cnip` = '198706242010121005'; -- HERI SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02327/042/084/2017' WHERE `cnip` = '197610242008102001'; -- HERMIN SAMPE MANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02845/042/719/2021', `cnosnt` = NULL WHERE `cnip` = '198207192005011001'; -- JUANDA ASTARANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02329/042/216/2017' WHERE `cnip` = '197605312008101001'; -- KUSWAHYUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02332/042/630/2017' WHERE `cnip` = '198906302010122005'; -- LEVLY PONTI YUDITIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09101/185/541/2020' WHERE `cnip` = '198111132009101004'; -- MAHFUT SOLIHIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02358/042/148/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198902202010122004'; -- MARYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02663/042/347/2021', `cnosnt` = NULL WHERE `cnip` = '197410292001121001'; -- MOHAMAD SUHERDIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02754/415/448/2021', `cnosnt` = NULL WHERE `cnip` = '196804241987021001'; -- MUHAMMAD RIFAAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02348/042/047/2017' WHERE `cnip` = '198009122008101001'; -- MUHTAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02659/042/452/2021', `cnosnt` = NULL WHERE `cnip` = '196909191995122001'; -- NEILCY TJAHJAMOONIARSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04801/185/153/2018' WHERE `cnip` = '197204262009102001'; -- NENENG APRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02687/415/253/2021', `cnosnt` = NULL WHERE `cnip` = '197206252007011001'; -- NGATIRAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02844/042/158/2021', `cnosnt` = NULL WHERE `cnip` = '197402261999031002'; -- NUR IRAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02363/042/054/2017' WHERE `cnip` = '197501252005012003'; -- NURUL AINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02346/042/895/2017' WHERE `cnip` = '197810202000121002'; -- RACHMAT JAMALUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02357/042/997/2017' WHERE `cnip` = '198406012008122001'; -- RENO SUBHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02331/042/699/2017' WHERE `cnip` = '196601032007012001'; -- RITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03739/185/102/2020' WHERE `cnip` = '197505312008101001'; -- SETIYOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04158/415/808/2021', `cnosnt` = NULL WHERE `cnip` = '197206122001121002'; -- S FAISAL REZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02330/042/808/2017' WHERE `cnip` = '197804182008012020'; -- SUMO LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02365/042/206/2017' WHERE `cnip` = '197507302007012001'; -- SURATINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04808/185/500/2018' WHERE `cnip` = '197007292001122001'; -- SURYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04809/185/801/2018' WHERE `cnip` = '198004242009102002'; -- SYARIFAH AMINUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02337/042/605/2017' WHERE `cnip` = '198105112008012024'; -- SYARIFAH SURYANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02509/042/006/2021' WHERE `cnip` = '198111272005011001'; -- SYARIF ZULKIFLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02366/042/627/2017' WHERE `cnip` = '198109262009102003'; -- TRIASIH ARITONANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02347/042/226/2017' WHERE `cnip` = '198504142008012002'; -- TYAS APRIANNA ANGRAENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04810/185/953/2018' WHERE `cnip` = '197010011996032002'; -- WAHDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03385/185/479/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198101132009102001'; -- YENNI OKTAVIANI SITORUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09405/017/518/2018' WHERE `cnip` = '197208172005012002'; -- AGUSTINA ELIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01912/017/413/2023', `cnosnt` = NULL WHERE `cnip` = '198705042014041001'; -- ALBET MAYDIANTORO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01777/017/012/2023', `cnosnt` = NULL WHERE `cnip` = '197310182000121001'; -- ANDIUS DASA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01820/017/211/2023', `cnosnt` = NULL WHERE `cnip` = '198005182001121002'; -- ARIF SUGIONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08011/185/840/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197907052005011003'; -- DEDI KUSWANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08053/185/546/2020' WHERE `cnip` = '198202212014092004'; -- DEWI DIANA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08033/185/844/2020' WHERE `cnip` = '198102072014092002'; -- DIAH WAHYUNINGRUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03051/017/549/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198105102009122004'; -- DIANNITA MAHARANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11328/017/255/2021', `cnosnt` = NULL WHERE `cnip` = '197907272001121007'; -- EDWIN HERWANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02025/017/869/2023', `cnosnt` = NULL WHERE `cnip` = '197108021995122001'; -- FAJAR GUSTIAWATY DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09332/185/877/2020' WHERE `cnip` = '196512041989011001'; -- GUNAWAN KARYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04350/191/182/2022' WHERE `cnip` = '197810142009102002'; -- HASPITA SATUR EKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11327/017/984/2021', `cnosnt` = NULL WHERE `cnip` = '198910012014041001'; -- HENDI WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01778/017/383/2023', `cnosnt` = NULL WHERE `cnip` = '196802251987031001'; -- HERO SATRIAN ARIEF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03061/017/890/2019' WHERE `cnip` = '197804272005012002'; -- IDA ROYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04353/191/595/2022' WHERE `cnip` = '197201142009102001'; -- IRINE ISNAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07912/185/719/2020' WHERE `cnip` = '196802101989012001'; -- KAMSIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09979/406/424/2022', `cnosnt` = NULL WHERE `cnip` = '197007192000121001'; -- KHAIRUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04317/191/135/2022' WHERE `cnip` = '197602152007012001'; -- LELY AYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01775/185/430/2021' WHERE `cnip` = '197806212008102001'; -- LISA KURNIASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01639/017/249/2023', `cnosnt` = NULL WHERE `cnip` = '197804302008121001'; -- MAULANA MUKHLIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09594/017/047/2018' WHERE `cnip` = '198907062010121011'; -- MUHAMMAD ISMAIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03697/185/345/2020' WHERE `cnip` = '197702252008102001'; -- MULYATI AJENG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01638/017/048/2023', `cnosnt` = NULL WHERE `cnip` = '197202271998021001'; -- MUSLIM ANSORI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05789/087/759/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197006042001121001'; -- NGADIMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04352/191/354/2022' WHERE `cnip` = '197410102007012001'; -- NURAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08004/185/052/2020' WHERE `cnip` = '197905292007102001'; -- NURI HATI BR GINTING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04321/191/750/2022' WHERE `cnip` = '198109092009102001'; -- NURMIYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02024/017/778/2023', `cnosnt` = NULL WHERE `cnip` = '196209281987031001'; -- PAUL BENYAMIN TIMOTIWU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08050/185/473/2020' WHERE `cnip` = '198202022009102002'; -- PEBRIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01616/191/074/2022' WHERE `cnip` = '198412142011011007'; -- POMPY PRATAMA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00033/017/696/2024', `cnosnt` = NULL WHERE `cnip` = '197410042000032002'; -- RAHAYU SULISTYORINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02305/087/690/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197703182000121003'; -- Roniyus Marjunus
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04199/017/603/2019' WHERE `cnip` = '198307172005011001'; -- SALAMMULLOH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07960/185/102/2020' WHERE `cnip` = '197504142007102001'; -- SARTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03080/017/301/2019' WHERE `cnip` = '197809272008101001'; -- SARYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06774/185/504/2020' WHERE `cnip` = '198210042015042001'; -- SITI AYUNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08008/185/206/2020' WHERE `cnip` = '197906192009102001'; -- SRI SUNARSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04349/191/200/2022' WHERE `cnip` = '197206252007012023'; -- SUPRIHATUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02155/017/303/2023', `cnosnt` = NULL WHERE `cnip` = '198101212003121001'; -- SUSANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02142/017/349/2023', `cnosnt` = NULL WHERE `cnip` = '197408312000032002'; -- VERA AGUSTRIANA NOORHIDANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04980/185/441/2017' WHERE `cnip` = '198612252014042001'; -- VERRA OKIU LIANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09749/017/959/2018' WHERE `cnip` = '197304052007012001'; -- WIJI ASMILINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01694/017/40/2023', `cnosnt` = NULL WHERE `cnip` = '198701082014042002'; -- WINDA TRIJAYANTHI UTAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01695/017/471/2023', `cnosnt` = NULL WHERE `cnip` = '196407161987032002'; -- YULIA NETA M
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05412/037/692/2023.' WHERE `cnip` = '197209081998021001'; -- I KETUT PARNATA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02693/087/390/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197605142001121002'; -- I MADE DEDY PURNAMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02735/191/527/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198602182009122002'; -- KADEK FEBI DWI JAYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01263/037/652/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198208172003122007'; -- NI PUTU SRI AGUSTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01264/037/653/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197107291994032002'; -- NI WAYAN ASTITI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00671/191/654/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197508241999032002'; -- NI WAYAN MARIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00818/037/157/2016' WHERE `cnip` = '197002201989032002'; -- NI WAYAN SULADRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00789/037/754/2017' WHERE `cnip` = '197009101991032001'; -- NYOMAN SUWARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09140/037/004/2022' WHERE `cnip` = '196712131989031002'; -- SI PUTU RAKA ARIAWAN, S.Sos
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01494/037/408/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198411282008122003'; -- SRI UTAMI DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08060/185/774/220', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198206292005012001'; -- YUNITA NDOEN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08409/414/211/2022', `cnosnt` = NULL WHERE `cnip` = '197409202002121001'; -- AMANG SUDARSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00460/098/211/2020', `cnosnt` = NULL WHERE `cnip` = '196611171991031004'; -- ARIES PRATIARSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05029/031/926/2022', `cnosnt` = NULL WHERE `cnip` = '197812102003121002'; -- BAMBANG SUMANTRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01265/031/334/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196911151992032001'; -- CHOLIDA ARIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00507/185/112/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199304142019031017'; -- KUNDOYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01263/031/942/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196903012001121001'; -- MARNO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00731/099/541/2019' WHERE `cnip` = '196801282000121001'; -- MUH MAKHFUT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00730/099/700/2019', `cnopnt` = NULL, `cnosnt` = 'SNT-03145/031/703/2024' WHERE `cnip` = '196802291991032001'; -- SULISTIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-08408/414/320/2022', `cnosnt` = 'PNT-08408/414/320/2022' WHERE `cnip` = '197001051995021001'; -- TRI BUDI SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05030/031/328/2022', `cnosnt` = NULL WHERE `cnip` = '196901071994031001'; -- TRI HARSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-04247/031/447/2022' WHERE `cnip` = '196511291994032001'; -- YENI SURYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00194/185/514/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197905042010012002'; -- ADISTI MEITARIA BOTUTIHE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01967/050/363/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198801152015042004'; -- FADLIANTY DJ. BAWU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01974/050/561/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198702172015042001'; -- FETRI I. LABOLO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01976/050/163/2020 BNT-08545', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198411252010122004'; -- FITRIANTY A. ARSYAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01975/050/862/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198105042005012002'; -- FITRIN TAHIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01980/050/088/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197801222010122002'; -- HAPSAH MUTIARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08424/191/288/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198103192015042002'; -- HARIANI TANDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07910/050/887/2018' WHERE `cnip` = '196709062000032001'; -- HASNAH N M ABDOEL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01986/050/884/2020' WHERE `cnip` = '198112062015042002'; -- HERLINA SY BADU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01989/050/397/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198707102010122007'; -- INDRIYANI HASAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01994/050/703/2020' WHERE `cnip` = '198501122009122006'; -- JEIN ANGGRAINI ALI NASIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06468/050/604/2018' WHERE `cnip` = '198307082006042002'; -- JULLYANA SAID
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07295/191/233/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197507032014092001'; -- LASWI KAMALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08564/191/243/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197908082008012024'; -- MASNI KAHARU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06533/185/847/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197408092006042006'; -- MIRNA ISHAK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02600/050/948/2023', `cnosnt` = NULL WHERE `cnip` = '198105052006042004'; -- MUKMIN DUNGGIO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02013/050/346/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197612252005012002'; -- MULIYANTI YUNUS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02599/050/755/2023', `cnosnt` = NULL WHERE `cnip` = '198102062005011001'; -- NANIZAR IMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02018/050/051/2020' WHERE `cnip` = '197602052009012002'; -- NING R. HULOPI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02019/050/052/2020' WHERE `cnip` = '197910302010122001'; -- NIRMAWATI H. DALI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04802/185/254/2018' WHERE `cnip` = '197807192002122001'; -- NISFA DIDIPU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09051/050/955/2022', `cnosnt` = NULL WHERE `cnip` = '197411152006041003'; -- NORMAN DIAH HAMIDUN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03032/050/858/2020 BNT-08547', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198011172009122002'; -- NOVIATY ABDULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02027/050/091/2020' WHERE `cnip` = '197305232002122002'; -- RAMLA DJABAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02035/050/490/2020' WHERE `cnip` = '197808012009122001'; -- RISQAHWATI SYAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02040/050/396/2020' WHERE `cnip` = '197712252008011013'; -- RUSLI LIMONU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01371/050/002/2016' WHERE `cnip` = '198303152006042019'; -- SANDRA TRIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02044/050/400/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198204092008012010'; -- SOFYA ABAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02051/050/408/2020' WHERE `cnip` = '197804232009102001'; -- SRININANG HADJARATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02540/050/701/2023', `cnosnt` = NULL WHERE `cnip` = '197501222003122001'; -- SUWARNI BAU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02054/050/421/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197612142009102001'; -- TETY J  MOONTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01374/050/175/2016' WHERE `cnip` = '198706282008122001'; -- YUNITA GANI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '0' WHERE `cnip` = '197708312001121001'; -- ABDURRAHMAN ABDULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06401/185/941/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198512032010011006'; -- Mesker Lenggu, S.Sos.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10283/190/244/2019' WHERE `cnip` = '198312262005012001'; -- MUTIA FARIDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08969/197/172/2018' WHERE `cnip` = '196601171986012001'; -- PURWANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08970/197/494/2018' WHERE `cnip` = '198203102009102001'; -- RITA HINDRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08972/197/306/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196608031986022001'; -- SOEHARMINING
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08973/197/107/2018' WHERE `cnip` = '197106162007012001'; -- SRI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01895/028/803/2017' WHERE `cnip` = '196806172000031001'; -- SUGITO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08976/197/700/2018' WHERE `cnip` = '197711102008102001'; -- SULASMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08978/197/302/2018' WHERE `cnip` = '197201032007012002'; -- SULISTYANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00866/028/700/2017' WHERE `cnip` = '196212061982111001'; -- SUROJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08979/197/703/2018' WHERE `cnip` = '197012161989032001'; -- SUSILOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10284/190/305/2019' WHERE `cnip` = '198510272010122002'; -- SUTARMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03101/028/505/2020' WHERE `cnip` = '196709301989022001'; -- SUWAHMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08980/197/925/2018' WHERE `cnip` = '197910112009102001'; -- TITIN SRIDHARWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01284/028/925/2018' WHERE `cnip` = '197111182000032001'; -- TRI DARYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10285/190/326/2019', `cnosnt` = NULL WHERE `cnip` = '197001051993031002'; -- TRI DJATMIKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02759/185/853/2017' WHERE `cnip` = '196208021991032001'; -- TUTI AGUSTIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08974/197/658/2018' WHERE `cnip` = '196611111993031001'; -- WARSITO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08981/197/876/2018' WHERE `cnip` = '197712102008102001'; -- Y HASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08982/197/377/2018' WHERE `cnip` = '198811232010122005'; -- YUDITH TIKA KURNIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08983/197/878/2018' WHERE `cnip` = '197807062007102001'; -- YULI LISTYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11782/186/659/2018' WHERE `cnip` = '198910082014042001'; -- NURLITA INDASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02186/004/677/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198210142009102001'; -- POPPI ERINA BR. SIREGAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11783/186/590/2018' WHERE `cnip` = '197803072009101002'; -- ROSIHAN ANWAR SITOMPUL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02188/004/999/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196812022009101001'; -- RUDI PERMADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-12759/004/704/2018' WHERE `cnip` = '197705262007012001'; -- SRI HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11784/186/271/2018' WHERE `cnip` = '198101202009101001'; -- YUDI PURNOMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11785/186/982/2018' WHERE `cnip` = '198003082000121001'; -- ZULFIKRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00676/004/289/2018', `cnopnt` = NULL WHERE `cnip` = '197910142001121001'; -- ZULKIFLI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07115/185/824/2019' WHERE `cnip` = '198603102015041001'; -- BASUKI RAHMAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08161/185/256/2018' WHERE `cnip` = '196612271987032001'; -- ETI ROHAETI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09013/185/973/2018' WHERE `cnip` = '198903092015041003'; -- GIA KELANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04462/185/936/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196811031994032003'; -- LIESJE FATIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07126/185/256/2019' WHERE `cnip` = '197808092009121001'; -- WIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02854/185/079/2018' WHERE `cnip` = '198712022010122009'; -- YULIA EKA PRADIKTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '1650/2.2.0.0.1/03/11/2011' WHERE `cnip` = '196909132006041001'; -- HARIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07317/185/548/2020' WHERE `cnip` = '198111042009102001'; -- MERI SUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-11154/030/342/2022' WHERE `cnip` = '197401101999031002'; -- MUHAMMAD NURWAKHID
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07938/185/557/2020', `cnosnt` = 'BNT-07938/185/557/2020' WHERE `cnip` = '197203302007011003'; -- NGABADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-0726211 851977 12020' WHERE `cnip` = '197204061992031003'; -- PARDISO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '1793/2.3.1.2.8/03/2006', `cnosnt` = '1793/2.3.1.2.8/03/2006' WHERE `cnip` = '197512242008102001'; -- PEMBAYUN SUTRASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04166/087/597/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198107092005011003'; -- R. AHMAD ROMADHONI SURYA PUTRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07929/185/707/2020', `cnosnt` = 'BNT-07929/185/707/2020' WHERE `cnip` = '197103242007012002'; -- SRI ISTIYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07923/185/ 401 /2020', `cnosnt` = NULL WHERE `cnip` = '197004121992031001'; -- SUGIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07904/185/900/2020', `cnosnt` = 'BNT-07904/185/900/2020' WHERE `cnip` = '196612311994031016'; -- SULISTIJA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '0002/2.2.0.0.1/03/11/2011' WHERE `cnip` = '196906252007011002'; -- SUTARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09556/185/225/2020', `cnosnt` = 'BNT-09556/185/225/2020' WHERE `cnip` = '197102021990031001'; -- TRUBUS WIBOWO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06662/048/840/2022', `cnosnt` = NULL WHERE `cnip` = '197808052015041001'; -- DAUD NAWIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-02270/048/201/2023' WHERE `cnip` = '196612161990021001'; -- SIGID BUDI SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09048/185/911/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198405022015042001'; -- KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09305/185/407/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110132014042001'; -- SYAMSIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09592/185/875/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198407272008022003'; -- YULI ARYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05414/112/534/2022', `cnosnt` = NULL WHERE `cnip` = '198202212009012005'; -- Laila Alfizanna, S.S., MDCC.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08914/185/042/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196807271999032001'; -- MARLYN JULIANSE SOPACUAPERU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-03649/087/292/2023', `dtgltsnt` = '2023-05-11', `dtglksnt` = '2028-05-11', `dtglsertifikat` = '2023-05-11', `dtglkadaluarsa` = '2028-05-11' WHERE `cnip` = '197804302005011001'; -- RUDY SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04387/191/402/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnosnt` = 'BNT-00953/185/407/2021', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197503272007011001'; -- SUNARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-00820/087/350/2024' WHERE `cnip` = '198006272010122001'; -- WIDAYANTI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00057043/121/3005/114/2022' WHERE `cnip` = '197802272003122001'; -- WILLMA ENGGLIANI FERDINANDUS
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '00057058/121/3005/114/2022' WHERE `cnip` = '197601171999032002'; -- CHRISTINA SIWALETTE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08361/185/958/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196610061989032001'; -- NURJIA SALASA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-001', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '200010122022012002'; -- Nurul Asri Kholifah
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00050340/121/3005/114/2022' WHERE `cnip` = '197303202005011001'; -- ALEXANDER ANDARIA PATTY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09091/185/19/2020' WHERE `cnip` = '197206021998032001'; -- AMELIA WAIRATTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04217/185/654/2021' WHERE `cnip` = '198010252014042001'; -- ELFILONA INGRIT I. KAPPUW
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09488/061/069/2019' WHERE `cnip` = '198410072014041001'; -- OKRIVEL KEKENUSA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08347/185/312/2020' WHERE `cnip` = '198306062005011001'; -- AHMAD FAISAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08380/185/119/2020' WHERE `cnip` = '197409102005011001'; -- ALAMSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03135/185/112/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198104082006042004'; -- APRILIA INDAH S
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08342/185/247/2020' WHERE `cnip` = '197906192005012002'; -- DASRIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08079/185/244/2020' WHERE `cnip` = '198312082005012001'; -- DESI RUTFINA WANDELMUD MANEK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01355/127/444/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197808012005012002'; -- DHEWI MURIANA  SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08368/185/355/2020' WHERE `cnip` = '198605042010122004'; -- EKA YULYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09306/185/358/2020' WHERE `cnip` = '197407142003122001'; -- ENDANG ISMAIL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07920/185/158/2020' WHERE `cnip` = '196909072002122001'; -- ERNA SURYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08333/185/567/2020' WHERE `cnip` = '198203022005012001'; -- FATIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04352/127/464/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198206082009122006'; -- FITRIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06112/124/880/2022', `cnosnt` = NULL WHERE `cnip` = '198706162009121002'; -- HENDRAWAN BAYU WICAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08016/185/985/2020' WHERE `cnip` = '197911102003122003'; -- HENNY PURYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05556/191/981/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197512132009122003'; -- HERLINA SITUMEANG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08433/185/088/2020' WHERE `cnip` = '197804292005012001'; -- HETI SITI MARIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07970/185/083/2020' WHERE `cnip` = '197605112003121001'; -- HUSNIH S
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07934/185/393/2020' WHERE `cnip` = '197201302005011001'; -- I WAYAN WARDANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08056/185/849/2020' WHERE `cnip` = '198204042005011001'; -- MAWARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08453/185/490/2018' WHERE `cnip` = '197612262005012001'; -- NINA TRIANA SOMAD
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08149/185/852/2020' WHERE `cnip` = '198903172014042001'; -- NORA AFRILA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07947/185/757/2020' WHERE `cnip` = '197211062005011001'; -- NOVRI HENDRY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05368/087/652/2022', `cnosnt` = NULL WHERE `cnip` = '198104302006042001'; -- NURHAJATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08496/185/457/2020' WHERE `cnip` = '197208071998022001'; -- NURIYAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07957/185/168/2020' WHERE `cnip` = '197410182005011002'; -- ONO SUGIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08049/185/271/2020' WHERE `cnip` = '198112282005012001'; -- PRASIWI SUSY NURWIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08199/191/497/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110222009101001'; -- RUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01987/131/645/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198704252010121005'; -- MUKHAMMAD ABIDIR ROKHMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05669/191/096/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198610232018011002'; -- RIZKAL RACHMAN SOFYAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08550/185/798/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196612202014091002'; -- RUSLAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '031218634887599', `cnosnt` = '031218634887599' WHERE `cnip` = '198309182008121002'; -- Yas Ahmad Adha, ST
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197405302014042001'; -- ETTY WAHYUNI MS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02271/191/812/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199309072019032019'; -- JERNIAH UMAYYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09048/185/911/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198405022015042002'; -- KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198203312014042001'; -- RICA SARIDEWI WAHYUDIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05124/048/502/2024' WHERE `cnip` = '198309232014042001'; -- SUHARTINI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198504232010121001'; -- TERA RONGGO PRIYAGUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03906/185/098/2018' WHERE `cnip` = '198707082015041002'; -- RUDY LEGOWARDOYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08551/185/609/2020' WHERE `cnip` = '198303112009101002'; -- SEPRIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08373/185/501/2020', `cnosnt` = 'BNT-08373/185/501/2020' WHERE `cnip` = '196904152007012037'; -- SITI FATIMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07129/185/009/2019' WHERE `cnip` = '197505032008101001'; -- SYAHRIL
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '041118576535211' WHERE `cnip` = '197402072008101001'; -- THOMAS BAYU FREELYAWAN LINARDHIE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01168/185/356/2021', `cnosnt` = 'BNT-01168/185/356/2021' WHERE `cnip` = '197706032009101002'; -- WAHID
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05510/087/351/2025', `dtgltpnt` = '2025-06-30', `dtglkpnt` = '2030-06-30', `cnosnt` = NULL, `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197809091997031001'; -- WARSUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06899/185/172/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197907172009102001'; -- YULIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04786/185/775/2018', `cnosnt` = NULL WHERE `cnip` = '198004142015042001'; -- YUSNA YUSUF
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07274/185/450/2020' WHERE `cnip` = '197102222007011001'; -- ENANG SUHARTONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11947/188/312/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197408132014091004'; -- AHMAD HAMDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11948/188/643/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198303202014092003'; -- DEVITA SYURYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11949/188/754/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198304022009101001'; -- ELWAN PRADILA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-06246/087/498/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '196911072007011001'; -- ILHAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00070/014/517/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198607042010121006'; -- KURNIADI ILHAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01654/188/546/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198801172010121006'; -- MUHAMMAD ARDY WALLIYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07990/185/105/2020' WHERE `cnip` = '197710062005011004'; -- SALMAN SALEH HASIBUAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09521/185/007/2020' WHERE `cnip` = '197404052005012001'; -- SRI ISWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09522/185/708/2020' WHERE `cnip` = '196910011989032001'; -- SRI MARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08573/185/803/2020' WHERE `cnip` = '196510241987032001'; -- SUNARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-06111/124/229/2022' WHERE `cnip` = '198205072005012001'; -- TESSA MELANIE WULANDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02310/087/936/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197302162006042001'; -- UMY KURNIATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07971/185/344/2020' WHERE `cnip` = '197605142005012002'; -- VENNY YUSMITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08106/185/555/2020' WHERE `cnip` = '198508222010122004'; -- WIDA SULISTYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07981/185/675/2020' WHERE `cnip` = '197701012005011002'; -- YANUARDI BUDI CAHYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07907/185/773/2020' WHERE `cnip` = '196707072003122001'; -- YULIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01330/045/217/2019' WHERE `cnip` = '197704132005012004'; -- AFRIDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06664/185/012/2020' WHERE `cnip` = '199209282014041001'; -- AHMAD NURYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01537/045/736/2020', `cnosnt` = NULL WHERE `cnip` = '196508081993031003'; -- CHAIRIL FAIF PASANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04818/191/041/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198612302009122007'; -- DESSY EMMA HARISUSANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05091/191/945/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198701302009121005'; -- DIKI RISIYANIRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03349/185/869/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197712101999031002'; -- FARID ADAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00024551/121/3005/114/2020' WHERE `cnip` = '198901022015042003'; -- FUJI HERNAWATY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04796/185/986/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198601222005012001'; -- HENNY SRI SUNDARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01393/045/096/2019' WHERE `cnip` = '198901202008011002'; -- INDRA NUR ADHITYA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-11855/045/20/2021' WHERE `cnip` = '197801062009121003'; -- IRHAM TAUFIQURRAHMAN
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01133/045/998/2020' WHERE `cnip` = '198407282008011004'; -- IRWAN MADIASA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08816/185/603/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198207092014092003'; -- JAMIATUNNOOR FITERI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01238/045/404/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198606042010121008'; -- JUPRIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01170/045/649/2017' WHERE `cnip` = '198310042006041002'; -- M FAJRIN RIFANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01092/045/242/2017' WHERE `cnip` = '197906282009101001'; -- M RUSLIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01386/045/948/2020', `cnosnt` = NULL WHERE `cnip` = '197001101993031013'; -- MUHAMMAD ARIFIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01293/045/345/2020', `cnosnt` = NULL WHERE `cnip` = '197605141999031005'; -- MUHAMMAD ILYAS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06902/045/647/2021', `cnosnt` = NULL WHERE `cnip` = '197501302002121003'; -- MUHAMMAD  SYAIFULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01550/045/341/2020', `cnosnt` = NULL WHERE `cnip` = '197407232005011002'; -- MUSLIMIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09337/045/952/2021' WHERE `cnip` = '197305042006042001'; -- NIZMAH RAHMI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-12189/045/651/2021' WHERE `cnip` = '197805152005011002'; -- NOORDIANSYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00419/045/254/2018' WHERE `cnip` = '197606302001122002'; -- NURLAYLA RAHMADHANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07681/191/912/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198208012014092003'; -- JUMRIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07667/191/943/2023' WHERE `cnip` = '197703052007012001'; -- KARTINI NOMPO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08336/185/810/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197402142008102001'; -- KASMAWATI IBRAHIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08524/185/049/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197410082014092002'; -- MADYANI KARIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08546/185/143/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198603132010121004'; -- MUHAMMAD AFWAN ISHMAYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07682/191/943/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198912092015041001'; -- Muh. Nur Fajerin BJ, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08372/185/840/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197707072014092004'; -- MULIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02488/185/752/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198101072008101001'; -- NADIR N
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05296/185/252/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198302272014092002'; -- NASTIAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05300/185/958/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198010282008102001'; -- NURMIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08497/185/558/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197808112014092002'; -- NURSYAMSI MALIK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05308/185/996/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197306212008102001'; -- RAHMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07683/191/894/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110082014092002'; -- ROSMINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00366/045/755/2020' WHERE `cnip` = '196601221986012001'; -- NURLINAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-14804/185/376/2018' WHERE `cnip` = '198705212015042003'; -- PUSPITA CHARYANI PUTERI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03351/185/272/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198803302015042002'; -- PUTRI ANUGRAHAENY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04806/185/498/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903052009102001'; -- RINNY PUJIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01437/045/995/2019' WHERE `cnip` = '198212152009122003'; -- RISNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00932/045/304/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198301012010122002'; -- SRI ENDRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03439/185/209/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198304072001121002'; -- SUPRIYADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00577/045/609/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198312112009121004'; -- SYAMSU RIZAL NOOR
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-11302/045/427/2021' WHERE `cnip` = '197805042003121004'; -- TOTOK WIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02290/014/813/2020' WHERE `cnip` = '197204051994032001'; -- ASMANIDAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '196606222000032001'; -- ERNI YUNIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-03641/014/564/2022' WHERE `cnip` = '196703181990021001'; -- FIRDAUS
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-04344/014/185/2021' WHERE `cnip` = '196511261990031002'; -- HAIRUL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00071/014/048/2020' WHERE `cnip` = '198311162009121005'; -- MUHAMMAD GAMAL HUROYROH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11343/014/442/2019' WHERE `cnip` = '196602191989031002'; -- MUKTI WISUDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09980/014/556/2019' WHERE `cnip` = '197011242001122001'; -- NOFITRI KURNIAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '061490672005801' WHERE `cnip` = '197803252011011001'; -- PIERRE YUDHISTIRA, S.T.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11951/188/247/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197712232014092002'; -- MURZILAWATI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-05794/087/095/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198402242010122004'; -- RENI CHAIRUNISYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10150/014/277/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198503062009122007'; -- YESSY IRDA SARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11952/188/078/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197409282006042004'; -- YUNISA RISNA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06666/128/294/2018' WHERE `cnip` = '196806111988011001'; -- RUDI SETIYONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00134/128/255/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196706111990031003'; -- WIWIN YUNIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05733/185/018/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198703112009121005'; -- Antoni Kurniawan
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03141/191/309/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198608012010012011'; -- SITTI MULYANA M, S.Pd
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08447/185/703/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197607252009102022'; -- SYAMSURIA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08339/185/853/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197704212007102001'; -- WATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08446/185/102/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198211182014092002'; -- ST. AISYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02524/185/403/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197407152014092004'; -- ST. FATMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08354/185/000/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197707272007012001'; -- SURIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01165/185/033/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197308022014091002'; -- UMAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-04165/087/576/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '197508232002121002'; -- TASRIFIN TAHARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05328/185/658/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198103312014092003'; -- WAHIDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07669/191/388/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198606212014091001'; -- ZAENAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03309/191/315/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198203282011012002'; -- Andi Martini Faisal
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08339/185/853/2020' WHERE `cnip` = '197704122007102001'; -- WATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10694/030/110/2019' WHERE `cnip` = '197106161999031002'; -- ANTUN WIDAKDO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06192/030/918/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199108292015041001'; -- ARGA BUDI PRASTYO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07931/185/710/2020' WHERE `cnip` = '197104141998032001'; -- ARNI WAHYU BUDI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07271/185/447/2020' WHERE `cnip` = '196510112001121001'; -- DULGANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07977/185/150/2020' WHERE `cnip` = '197609092005012002'; -- ERIKA RAHAYU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05316/185/135/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198508282009121002'; -- LANANG PRASAJA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07572/440/731/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198311222008011004'; -- LULUS PURWATMO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07241/185/854/2020' WHERE `cnip` = '198711012009122004'; -- NOVIE RAHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05105/087/051/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198201272008122002'; -- NUR AENI ARIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00203/088/275/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198603142009122002'; -- GADISTIA LARASATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01621/022/900/2019' WHERE `cnip` = '198102082005011002'; -- JAJANG SUPRIATNA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-02303/087/728/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197403301999031002'; -- KUSNANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01446/022/795/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198511202010122006'; -- RUBIYANTI WIJAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05653/191/379/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198106172009122002'; -- YUNIARTI SURTIASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '01931/038/304/2020', `cnosnt` = NULL WHERE `cnip` = '197406241999031002'; -- SUDARMAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02303/038/258/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198603232009122009'; -- NURFARDIATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02307/038/302/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197104012005012001'; -- SUSI LESTARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01914/191/395/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198505052009122003'; -- RAHMA UMARANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09356/185/893/2018' WHERE `cnip` = '196711302001122001'; -- RETNA KUSABANDINAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-11315/128/741/2021' WHERE `cnip` = '196601131993032002'; -- RATRI YUNARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01891/131/549/2020', `cnosnt` = NULL WHERE `cnip` = '197105112007102001'; -- MUTMAINAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00397/131/359/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196909092006042001'; -- NENY SETYAWATI, S.E.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01934/131/157/2018' WHERE `cnip` = '197411171999032002'; -- NOVY KARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03806/414/257/2021', `cnosnt` = NULL WHERE `cnip` = '196904122001121007'; -- NURI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01900/131/100/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197302092009102001'; -- SAPTA WIJIARTRIE ARDHA, S.P.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03807/414/778/2021', `cnosnt` = NULL WHERE `cnip` = '196403041989021001'; -- SOETRIONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03670/414/946/2021', `cnosnt` = NULL WHERE `cnip` = '197007052003122001'; -- SRI HERNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00822/131/102/2019', `cnosnt` = NULL WHERE `cnip` = '196805112001122001'; -- SUNARNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-03816/414/08/2021', `cnosnt` = NULL WHERE `cnip` = '197304241999031002'; -- SUPANGAT
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01760/131/924/2017' WHERE `cnip` = '197203251999031002'; -- TAUFAN MUDIHARTONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01890/131/228/2020' WHERE `cnip` = '196908092007012001'; -- TJAHYA INDRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01942/131/256/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197903032009101003'; -- WAWAN INDRATIKTA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07649/131/256/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198507202006041001'; -- WIDIYANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-09131/012/384/2021' WHERE `cnip` = '197504252005011001'; -- ZAENAL ABIDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07347/016/071/2018' WHERE `cnip` = '197309292014092003'; -- YETI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08080/185/676/2020' WHERE `cnip` = '198312112014092002'; -- YOSI KOMALASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02477/185/130/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198303162007011003'; -- Limin Umar Jaya
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197001041993032001'; -- NENENG NOERHASANAH  M
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-02307/087/472/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197509212000121001'; -- AMZUL RIFIN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '-' WHERE `cnip` = '197512242005012001'; -- ERNA PRASTIWI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-', `cnosnt` = '-' WHERE `cnip` = '197007181995122001'; -- INDAH YULIASIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03537/087/978/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198212062008101002'; -- PERI SIANTUNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08426/185/820/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197101182007011001'; -- BENEDICTUS SAMPUL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06891/185/424/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196509221987021001'; -- BERTJE LANGI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07913/185/930/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196803072005012001'; -- CHERRY SEVREE TUTI SEISKA PAENDONG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06440/185/034/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196910131991122001'; -- CONNY OLGA LANTU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08385/185/664/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198302132008102001'; -- FEBYOLA RUATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09326/185/960/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196602051987031001'; -- FRANKY WINDAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06890/185/003/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197809242008102001'; -- JEBY MYKEL ADELEIDE RATTU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07067/185/80/2018', `cnopnt` = 'BNT-07067/185/80/2018', `cnosnt` = NULL WHERE `cnip` = '198303132015042002'; -- NURLAELI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07011/185/299/2018', `cnopnt` = 'PNT-06135/087/295/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198401272010122003'; -- RENI HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-19379/087/879/2025', `dtgltpnt` = '2025-12-31', `dtglkpnt` = '2030-12-31', `cnosnt` = '-', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '197506282003122001'; -- YOHANA RUMANDA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197406102001121001'; -- Yuni Syam, S.Kom.
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-09086/404/773/2021', `cnosnt` = 'PNT-09086/404/773/2021' WHERE `cnip` = '198807132015042004'; -- YULI AULIANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02704/185/503/2017' WHERE `cnip` = '196506081987032002'; -- SUYATMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07749/191/827/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198511122008031003'; -- Budi Setiyono, S.E.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01254/031/642/2016', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198803162010122003'; -- MARTIANA HAKIM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07319/143/540/2021', `cnosnt` = NULL WHERE `cnip` = '197205011999032007'; -- Mei Susanti Harahap, SH, MM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02648/049/640/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198110152008102001'; -- MARIANA OKTAVIANE DOMPASA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08410/185/243/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197503072008102001'; -- MARLINA SYAHBUDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-11298/049/641/2023', `cnosnt` = NULL WHERE `cnip` = '198105112008012025'; -- MAYGGIE REGINA BEDJE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08371/185/849/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198612102010122004'; -- MERRY CHRISTIN LANGI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08390/185/840/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197704282007012001'; -- MERRY HETTY KUMOWAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06586/185/065/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197510231995022002'; -- OLHA RONDO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06739/185/195/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197901132008101001'; -- RENALD JAMES PAKASI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02659/049/602/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197109181993031002'; -- STANLEY HARRY LUMOWA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06636/185/801/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196705192007012001'; -- SUZANA ANETTA RATAG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00231/049/446/2024', `cnosnt` = NULL WHERE `cnip` = '197305272005012001'; -- VITA MASENGI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07627/049/352/2023', `cnosnt` = NULL WHERE `cnip` = '198306242014041001'; -- WEMFRITS CHRISTIAN RUMBAJAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05061/185/752/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196904172007012001'; -- WIESKE ANNELEEN RATAG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01344/087/392/2024', `dtgltpnt` = '2024-02-12', `dtglkpnt` = '2029-02-12', `cnosnt` = NULL, `dtglsertifikat` = '2024-02-12', `dtglkadaluarsa` = '2029-02-12' WHERE `cnip` = '198207242008011007'; -- REKSO GRAHARA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = '00059001/121/3005/114/2022' WHERE `cnip` = '196610121990031001'; -- SUPRAYOGI MAURANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00027/088/409/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197405081994031004'; -- SUTEJO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06716/191/570/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197004131992031002'; -- YAHNO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-01785/087/571/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197401122000121005'; -- YAYA SUTARYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-09279/087/807/2023', `cnosnt` = NULL WHERE `cnip` = '197912271999031002'; -- SUSILO PARMOKO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06127/185/806/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197502222005012001'; -- SUYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06130/185/200/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197410281999031001'; -- SYARIF HIDAYATULLAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05559/185/354/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197409032009122001'; -- WIWIK ENDANG SULISTIYOWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06049/087/879/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198007302005012003'; -- YULI RAHMAWATI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00040750/121/3005/114/2022' WHERE `cnip` = '196812291989011002'; -- Drs. IRWAN HALID, M.Si.
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '021322158916541' WHERE `cnip` = '197606172002122005'; -- LELIYANA LAHAY, S.Kom.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '01619/050/477/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198404142008012015'; -- Pelmawaty Djafar
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '03871/191/499/2022', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198010052014091003'; -- I WAYAN GEDE OKANTARA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '196612181991031003'; -- LIE JASA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03921/185/645/2017' WHERE `cnip` = '198112312006042001'; -- MADE PRAMODYA HAPSARI DEWI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03922/185/456/2017', `cnosnt` = '-' WHERE `cnip` = '198404172014092002'; -- NI KADEK APRIYANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03923/185/357/2017' WHERE `cnip` = '197602172009122003'; -- NI KADEK SUARTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03926/185/550/2017' WHERE `cnip` = '197506162014092003'; -- NI KETUT RAI ARYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03927/185/751/2017' WHERE `cnip` = '197903172014092002'; -- NI KOMANG SRI MARIATINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03928/185/352/2017' WHERE `cnip` = '197708012005022004'; -- NI LUH PUTU DEWI AGUSTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03929/185/153/2017' WHERE `cnip` = '198705102009122003'; -- NI LUH PUTU RUSMADEWI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '196308011987022001'; -- NI LUH PUTU WIAGUSTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06904/185/059/2019' WHERE `cnip` = '198205232014092003'; -- NI MADE DEWI ANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03930/185/055/2017' WHERE `cnip` = '197601152014092003'; -- NI MADE DEWI NURHAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03373/185/556/2020' WHERE `cnip` = '198509212005012003'; -- NI MADE LENNY YANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03932/185/157/2017' WHERE `cnip` = '198702222009122002'; -- NI PUTU DEVI UDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03934/185/559/2017' WHERE `cnip` = '198104112014092001'; -- NI WAYAN ARIYASTINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '196605101991032003'; -- PUTU TASTRINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09656/031/796/2018' WHERE `cnip` = '198308082008012011'; -- RIRIT PURWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07927/185/505/2020' WHERE `cnip` = '197012142005012001'; -- SUSI RAHAYU MARYANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09352/010/949/2019' WHERE `cnip` = '196903101989012001'; -- METDIAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07287/185/454/2020' WHERE `cnip` = '198711252010122006'; -- NOVEL ANTIKA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09310/010/993/2019' WHERE `cnip` = '198102172002122001'; -- RIA PRIMA PUSPA RENI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04948/185/395/2020' WHERE `cnip` = '197605142001121003'; -- RIKI BASRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10287/185/498/2020' WHERE `cnip` = '197705142006042031'; -- RISMAINI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09309/010/191/2019' WHERE `cnip` = '198002012009101002'; -- ROHMADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09096/185/904/2020' WHERE `cnip` = '199106302014032001'; -- SRI MITRAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05153/185/174/2020' WHERE `cnip` = '197701062010012009'; -- YENI DILLA ROZA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03817/185/279/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197411182014092002'; -- YESSY NOVIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04143/185/472/2018' WHERE `cnip` = '198001142014092002'; -- YUNAFRITA HAROMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10642/060/763/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198210152010121004'; -- OKTONIUS ADHE TRI SALLY NINUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04748/185/093/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196711232014092001'; -- RITA ARIYATI NAPPU
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05985/185/707/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197908132009032003'; -- SALFIA LAMUSERE
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-06595/060/505/2022' WHERE `cnip` = '198009262010122003'; -- SARLINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10650/060/132/2019' WHERE `cnip` = '196908262014091001'; -- USMAN AK
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11327/010/974/2019' WHERE `cnip` = '197102182007012001'; -- YUSNAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11266/010/186/2019' WHERE `cnip` = '197611242014092002'; -- ZULHIDAYATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01644/191/635/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198407072007011002'; -- LILIS
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '197810302008102001'; -- OKI SRI LINANGKUNG
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '197807252009102001'; -- RETNO WINARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07113/185/392/2019' WHERE `cnip` = '198706022009122004'; -- RINI UTAMI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198607252009122006'; -- RULI INDRIANI
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '-' WHERE `cnip` = '198306202005012001'; -- RULI PASAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08130/185/252/2020' WHERE `cnip` = '198703222014042001'; -- WAHYUNINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04165/185/976/2018' WHERE `cnip` = '196407112008102001'; -- YULIA KVINAWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03920/191/674/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198907202015021002'; -- YULNAEZAR PRAMUDYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00626/191/854/2026', `dtgltbnt` = '2026-03-31', `dtglkbnt` = '2031-03-31', `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197905072002122002'; -- NURTI NURYO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-08672/004/803/2022', `dtgltpnt` = '2022-09-30', `dtglkpnt` = '2027-09-30', `dtglsertifikat` = '2022-09-30', `dtglkadaluarsa` = '2027-09-30' WHERE `cnip` = '197405022001122001'; -- SITI ANOM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-10679/004/183/2026', `dtgltpnt` = '2026-08-05', `dtglkpnt` = '2031-08-05', `cnosnt` = 'SNT-08945/004/186/2022', `dtgltsnt` = '2022-10-11', `dtglksnt` = '2027-10-11', `dtglsertifikat` = '2022-10-11', `dtglkadaluarsa` = '2027-10-11' WHERE `cnip` = '197110112002121002'; -- ZULKARNAIN LUBIS
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-11814/054/905/2021' WHERE `cnip` = '197301172001121001'; -- SYAFARUDDIN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT- 06334/185/806/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '196604021990031003'; -- SIGIT RESTUHADI
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '0' WHERE `cnip` = '196504111993031001'; -- LULUT ENDI SUTRISNO
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '0' WHERE `cnip` = '196402011984031001'; -- RUJITA
UPDATE `kepeg_m_pegawai` SET `cnopnt` = '0' WHERE `cnip` = '196310211983031001'; -- SAGIYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08030/185/441/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198101222009102002'; -- VIVI YANUARI NINGSIH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06878/185/229/2020' WHERE `cnip` = '198109132008102001'; -- TRISNA GUSNELI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01467/185/748/2021' WHERE `cnip` = '197605182008011011'; -- MUHAMMAD NASIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04482/185/048/2020' WHERE `cnip` = '198301262008101001'; -- MUHAZIR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00210/001/843/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197503031999031003'; -- MUKTAMAR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04968/185/857/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198012162008122003'; -- NURUL FITRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09478/185/498/2020' WHERE `cnip` = '198409122008012005'; -- RINA IDRIANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05955/185/004/2020' WHERE `cnip` = '197705102007012002'; -- SASTRI RAHAYUNI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06588/185/407/2021', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198106272008101001'; -- SYAFRIZAL
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-16741/001/329/2025' WHERE `cnip` = '198209222006041001'; -- T IRFAN SUJANA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04355/185/927/2020' WHERE `cnip` = '198210172006041003'; -- T. ZULFIAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09604/185/489/2020' WHERE `cnip` = '197906112009102002'; -- ZIKRIAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00528/031/405/2018', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198601272010122005'; -- SITI NUR KOMARIYAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-00554/031/404/2018' WHERE `cnip` = '197906112007011001'; -- SUEB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08918/191/706/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197508162008102001'; -- SUSILO HANDAYANI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05107/087/503/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '198001062005012005'; -- SYARIFA HANOUM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04805/185/797/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197706252005012001'; -- RAHMANIA ADAM
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06895/061/608/2023', `cnosnt` = NULL WHERE `cnip` = '197307272005011002'; -- SONNY PITRENO KAILOLA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07851/185/991/2020' WHERE `cnip` = '197809052001121002'; -- IGNATIUS  KRA  TWAMANGKWA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07972/185/575/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197606162003122001'; -- YULIA SITTISALMA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05071/008/113/2022', `cnosnt` = NULL WHERE `cnip` = '197203091999031010'; -- AHMAD FAISAL
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04122/185/319/2018' WHERE `cnip` = '197903222008101002'; -- ALISMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08044/185/016/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198109112014092001'; -- ARI ERLINA ASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08046/185/418/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198112112014091002'; -- ARVINALDE AMENDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08086/185/642/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198404192014091001'; -- DADANG MANSYUR
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-07337/008/040/2021', `cnosnt` = NULL WHERE `cnip` = '197806272009101001'; -- DEDIK SANTOSO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04469/185/153/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197901132014091002'; -- EFFI MASRI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09300/185/452/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198012302006042003'; -- EKA DESNYARTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09473/008/653/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197312122014091003'; -- ERPAN RAJAB
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05133/008/842/2022', `cnosnt` = NULL WHERE `cnip` = '197609062003122001'; -- EVI DELIANA HZ
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08019/185/668/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197912072014091002'; -- FAISAL BHAKTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09476/008/186/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198404142014091003'; -- HARTA DINATA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05093/008/497/2022', `cnosnt` = NULL WHERE `cnip` = '197203021993031002'; -- IWAN SETIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08021/185/601/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198004042006041001'; -- JON PRIADI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05070/008/212/2022', `cnosnt` = NULL WHERE `cnip` = '197507122005011001'; -- JULIA INDRA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05060/008/521/2022' WHERE `cnip` = '197407071999031002'; -- KURNIAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05287/185/592/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198606302014091001'; -- RAJA BOY RIWA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08114/185/094/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198512312005011003'; -- RIEFCO SAPRIYA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07937/185/406/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197203201999031002'; -- SUFARMAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07994/185/109/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197802042014091002'; -- SUPRIANTO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10163/008/201/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197801242005011003'; -- SUWANDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05079/008/121/2022', `cnosnt` = NULL WHERE `cnip` = '197401181993031001'; -- TRI GUNAWAN
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01395/017/188/2017', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198702132010122005'; -- WANDHA PARAMITHA DHUANGGA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07993/185/978/2020', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '197801122014092002'; -- YENNI SYAFWARDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-10176/031/475/2019', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198406152009121002'; -- YUDIANTO WICAKSONO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09127/185/899/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199202142015032002'; -- Ririn Budiarti
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-06343/087/846/2024', `dtgltpnt` = '2024-07-18', `dtglkpnt` = '2029-07-18', `cnosnt` = NULL, `dtglsertifikat` = '2024-07-18', `dtglkadaluarsa` = '2029-07-18' WHERE `cnip` = '198209272010011030'; -- Dwi Wahyu Iriadi, S.T.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02581/087/006/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199706262022032020'; -- SAFIRA SALSABILLA
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-09887/087/822/2025', `dtgltsnt` = '2025-09-30', `dtglksnt` = '2030-09-30', `dtglsertifikat` = '2025-09-30', `dtglkadaluarsa` = '2030-09-30' WHERE `cnip` = '199008012022032004'; -- TITA NURLITA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '-' WHERE `cnip` = '199506252022032010'; -- KRISMAWATI MASSOLO
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06401/191/641/2024' WHERE `cnip` = '199102222022032007'; -- MUTYA ASIH
UPDATE `kepeg_m_pegawai` SET `cnosnt` = '00012921/121/3005/114/2025' WHERE `cnip` = '199809222022032011'; -- GRACE SEPTIANA, A.md.Ak.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02114/191/358/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199108052022032015'; -- NURUL AGUSTINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-03761/191/757/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199805052022032020'; -- ERIAWANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07754/191/713/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199509132022031008'; -- AR RAZY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05101/087/647/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `cnosnt` = 'SNT-04243/019/643/2024', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199806302022032009'; -- DELA YUNIARSIH, S.Pd.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07169/191/963/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199806242022031004'; -- FAJRIL ARIF PUTRA, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06357/191/701/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199409232022032007'; -- SANNY PERMATASARI SILALAHI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01091/191/201/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199911022022012004'; -- Savira Jasmine Bashori
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07479/191/767/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '199207272022032010'; -- FATHIMATHUZ ZAHRAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07493/191/253/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `cnosnt` = NULL, `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '199306222022032018'; -- NADIA INGRIDA SARASWATI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-09276/191/704/2024', `dtgltbnt` = '2024-10-01', `dtglkbnt` = '2029-10-01', `dtglsertifikat` = '2024-10-01', `dtglkadaluarsa` = '2029-10-01' WHERE `cnip` = '199401212022032007'; -- SRI REZEKI CLARA DEVI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01035/191/299/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199410262022032013'; -- IRENE ANDIANI PUTRI, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-1136/191/995/2024, BNT-09457', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198009112010011005'; -- Indra Kurniawan, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02747/191/510/2023' WHERE `cnip` = '199212102022032014'; -- ANDRITA PURNAMASARI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-00081/191/239/2025', `cnosnt` = NULL WHERE `cnip` = '199012282020121008'; -- CHRISTIAN NOEL FILEMON
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08866/191/1618/2023', `cnosnt` = 'BNT-08866/191/618/2023' WHERE `cnip` = '199909182022032006'; -- ARIFA NURUL AZIZ, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08910/191/458/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199911132022032008'; -- NURUL INDAH, A.Md.Ak.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08910/191/458/2023', `cnopnt` = NULL, `cnosnt` = '-' WHERE `cnip` = '199606212022032013'; -- SYIFA AYU YUNINGSIH, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '02647/191/619/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198412292014071001'; -- ANDI KIFRAN
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-08719/051/445/2026', `dtgltsnt` = '2026-07-07', `dtglksnt` = '2031-07-07', `dtglsertifikat` = '2026-07-07', `dtglkadaluarsa` = '2031-07-07' WHERE `cnip` = '198609102008012001'; -- DEIBYFRIDA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '03554/191/547/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198301212011012006'; -- DWI WAHYULIANTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04078/191/339/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199503192022032015'; -- LITA FITRIYA WAHYUNING GUSTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02654/191/107/2025', `dtgltbnt` = '2025-04-10', `dtglkbnt` = '2030-04-10', `dtglsertifikat` = '2025-04-10', `dtglkadaluarsa` = '2030-04-10' WHERE `cnip` = '199109022022032006'; -- SURTI UTAMI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-11338/191/756/2024' WHERE `cnip` = '199605252022032013'; -- NIKMALA GATRA HERINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01111/191/284/2024', `dtgltbnt` = '2024-04-01', `dtglkbnt` = '2029-04-01', `dtglsertifikat` = '2024-04-01', `dtglkadaluarsa` = '2029-04-01' WHERE `cnip` = '199710232022032012'; -- ZHAZHA MIA ADELINA
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07186/191/482/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199403172022031006'; -- HARUN EFFENDY
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08599/191/401/2023', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199301102022032005'; -- SUCI NURROHMAH
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07766/191/946/2023' WHERE `cnip` = '198903272022032012'; -- DIAN WIDIASTUTI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-07736/191/153/2023' WHERE `cnip` = '199211262022032013'; -- EVYN MUNTYA PRAMBUDI
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = '-', `cnosnt` = NULL WHERE `cnip` = '197203302002121002'; -- Tajuddin Idris, S.Si, M.T
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05500/191/640/2024' WHERE `cnip` = '199512182022032023'; -- Destiana Murtiyani,A.Md.Si
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02770/191/796/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199403102022032015'; -- Indah Novita Sari, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02676/191/341/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199705202022032022'; -- Dinda Aulia, A.Md.Ak
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-08626/191/092/2024' WHERE `cnip` = '199603202022032022'; -- Riska Rahma Pratiwi
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01663/191/196/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198804012022032005'; -- Riska Cendy Tumbelaka
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04330/191/390/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '198310292008032001'; -- Roza Lina, M. Pd
UPDATE `kepeg_m_pegawai` SET `cnobnt` = '05546/191/140/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199512312022032018'; -- Vidhya Deseva
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05022/191/319/2025', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199607012022031011'; -- A. Nuzul
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06785/191/346/2025', `dtgltbnt` = '2025-12-30', `dtglkbnt` = '2030-12-30', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-12-30', `dtglkadaluarsa` = '2030-12-30' WHERE `cnip` = '199308042022032014'; -- Voni Rahmi
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01397/191/920/2026', `dtgltbnt` = '2026-07-24', `dtglkbnt` = '2031-07-24', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '199303042022031010'; -- Krishna Cahya Murthi Kuncoro, S.Pd.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04784/191/953/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199504102022032019'; -- Nurhidayah Borahima
UPDATE `kepeg_m_pegawai` SET `cnopnt` = 'PNT-07573/440/942/2026', `dtgltpnt` = '2026-07-24', `dtglkpnt` = '2031-07-24', `dtglsertifikat` = '2026-07-24', `dtglkadaluarsa` = '2031-07-24' WHERE `cnip` = '196901121992031003'; -- Medy Eka Suryana, S.IP., M.M.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-01700/191/818/2024', `cnopnt` = NULL, `cnosnt` = NULL WHERE `cnip` = '199201152022032012'; -- Anisa Nurul Fadilla
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-03699/060/097/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '197802032014081002'; -- Rusmanto
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-05076/191/798/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '198610202022032002'; -- Resthin Rio Raya, S.E.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-06700/191/023/2024', `dtgltbnt` = '2024-07-01', `dtglkbnt` = '2029-07-01', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2024-07-01', `dtglkadaluarsa` = '2029-07-01' WHERE `cnip` = '199603112022031008'; -- Buma Aeri Argeswara, A.Md.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-04821/191/805/2025', `dtgltbnt` = '2025-10-03', `dtglkbnt` = '2030-10-03', `cnopnt` = NULL, `cnosnt` = NULL, `dtglsertifikat` = '2025-10-03', `dtglkadaluarsa` = '2030-10-03' WHERE `cnip` = '199702192022032017'; -- Siti Rahmaniah Putri, S. Pd.
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-01618/492/996/2026', `dtgltpnt` = '2026-03-31', `dtglkpnt` = '2031-03-31', `cnosnt` = NULL, `dtglsertifikat` = '2026-03-31', `dtglkadaluarsa` = '2031-03-31' WHERE `cnip` = '197910022009021001'; -- Ikhwan, S.Si., M.Ec.Dev
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = NULL, `cnosnt` = 'SNT-05169/087/161/2025', `dtgltsnt` = '2025-06-30', `dtglksnt` = '2030-06-30', `dtglsertifikat` = '2025-06-30', `dtglkadaluarsa` = '2030-06-30' WHERE `cnip` = '199901022022031010'; -- Fariz Amri Ramdhani
UPDATE `kepeg_m_pegawai` SET `cnosnt` = 'SNT-16735/009/452/2025', `dtgltsnt` = '2025-12-31', `dtglksnt` = '2030-12-31', `dtglsertifikat` = '2025-12-31', `dtglkadaluarsa` = '2030-12-31' WHERE `cnip` = '199502172025061004'; -- Nuzul Fauzan Mustova
UPDATE `kepeg_m_pegawai` SET `cnobnt` = 'BNT-02269/087/299/2026' WHERE `cnip` = '198510262010013019'; -- Rosari Luhlike Wijayanti
UPDATE `kepeg_m_pegawai` SET `cnobnt` = NULL, `cnopnt` = 'PNT-05750/015/417/2026', `cnosnt` = NULL WHERE `cnip` = '197709292010011013'; -- Aan Widi Harmoko