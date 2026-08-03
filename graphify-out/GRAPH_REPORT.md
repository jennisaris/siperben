# GRAPH_REPORT.md — Siperben Knowledge Graph
**Project:** Sistem Perbendaharaan (Treasury Management System)  
**Organization:** Biro Keuangan · Kemendikbud (Indonesia Ministry of Education, Culture, Research & Technology)  
**Generated:** 2026-08-03  
**Graphify Version:** Full Pipeline  

---

## 📊 Summary Statistics

| Metric | Value |
|--------|-------|
| Total Nodes | 72 |
| Total Edges | 131 |
| Communities | 7 |
| God Nodes (high-in-degree) | 8 |
| Framework | CodeIgniter 3 + HMVC (MX) |
| Database | MySQL `db_app01` (~8.6 GB) |
| Primary Language | PHP |
| Theme | AdminLTE 2.3.11 |

---

## 🏘️ Communities

| # | Community | Color | Nodes | Description |
|---|-----------|-------|-------|-------------|
| 0 | Framework Core | `#6c5ce7` | 6 | CodeIgniter 3 system, HMVC extension (MX), base classes |
| 1 | Auth & Privileges | `#e17055` | 9 | User auth, session guard, group-based ACL |
| 2 | Treasury (Perbend) | `#00b894` | 30 | Core business: SK issuance, proposals, verification |
| 3 | HR (Kepegawaian) | `#0984e3` | 7 | Employee master data, org units, rank/grade |
| 4 | Dashboard & Reports | `#fdcb6e` | 9 | Executive dashboard, laporan, EWS |
| 5 | Infra & Config | `#636e72` | 8 | Config files, helpers, libraries, DB, theme |
| 6 | External Integrations | `#fd79a8` | 5 | PHPWord, mPDF, PHPMailer, REST, DIKBUD API |

---

## ⚡ God Nodes (High Centrality / Cross-Cutting)

These nodes are depended upon by many others. They represent highest architectural risk — changes ripple widely.

| Node | Type | Why Critical |
|------|------|-------------|
| `MX_Controller` | Class (base) | Every module controller inherits from this; entire HMVC architecture depends on it |
| `DB_MySQL (db_app01)` | Database | Single MySQL database for all 3 prefixes (priv_, kepeg_, app_) |
| `Template_Lib` | Library | Renders all responses; checks allowview session; builds all page chrome |
| `CheckSession_Helper` | Helper | Autoloaded on every request; enforces authentication globally |
| `M_unor_Perbend` | Controller | Provides getRekursifUnit() traversal; required by Dashboard, User_Auth, T_terbit_sk |
| `User_Authentication` | Controller | Default route; source of all session data |
| `T_terbit_sk` | Controller | 1,646-line god controller; SK issuance with Word/PDF generation |
| `T_usulan_satker` | Controller | 2,263-line god controller; most complex business logic |
| `M_kepegawaian_unor` | Controller | Required by User_Authentication and M_pegawai; HR org unit hierarchy |

---

## 🔄 Request Lifecycle

```
HTTP Request
     │
     ▼
index.php (Front Controller)
     │  boots
     ▼
CodeIgniter 3 Core
     │  extends
     ▼
MX (HMVC) Extension
     │  dispatches to
     ▼
check_session_helper.php  (autoloaded on every request)
     │  if no session → redirect
     ▼
privileges/user_authentication (login)
     │  if authenticated → continue
     ▼
Operator_registration_check (hook)
     │  post_controller_constructor
     ▼
Target Controller (extends MX_Controller)
     │  reads/writes
     ├──► MySQL (db_app01)
     │  renders via
     └──► Template Library → AdminLTE 2.3.11 theme
```

---

## 🗂️ Module Architecture

### Module: `modules/privileges/`
Authentication and access control.

| Controller | Table(s) | Key Methods |
|------------|----------|-------------|
| `User_authentication` | `priv_t_user` | formLogin(), doLogin(), doLogout() |
| `User` | `priv_t_user` | CRUD, manages group assignments |
| `Group` | `priv_t_group` | CRUD for role groups |
| `Menu` | `priv_t_menu` | Navigation tree management |
| `Sysparam` | `priv_t_sysparam` | System parameters |
| `Approval_pengguna` | `priv_t_user` | Registration approval |
| `Change_password` | `priv_t_user` | Credential change |

### Module: `modules/perbend/` (63 controllers)
The heaviest module — treasury transaction processing.

**Transaction Controllers:**
| Controller | Size | Purpose |
|------------|------|---------|
| `T_usulan_satker` | 87 KB / 2263 lines | Proposal submission by work unit (satker) |
| `T_usulan_daftar` | 49 KB | Proposal listing for treasury officers |
| `T_terbit_sk` | 63 KB / 1646 lines | SK (decree) issuance with Word/PDF export |
| `T_usulan_approval` | 38 KB | Multi-stage approval workflow |
| `T_usulan_verifikator` | 33 KB | Verifier decision workflow |
| `T_usulan_pelatihan` | 31 KB | Training proposal workflow |

**Master Data Controllers:**
- `M_unor` — Organizational unit hierarchy (GOD node; recursive tree traversal)
- `M_unor_rekening` — Bank account mapping per org unit
- `M_jabatan` — Job position master
- `M_ttd` — Authorized signatories for SK documents
- `M_status`, `M_perubahan`, `M_pelatihan` — Reference data

### Module: `modules/kepegawaian/`
Employee / HR master data.

| Controller | Size | Purpose |
|------------|------|---------|
| `M_pegawai` | 48 KB | Full employee record management (NIP, golongan, jabatan) |
| `M_kepegawaian_unor` | 23 KB | HR org unit (cross-imported by auth & perbend) |
| `M_jabatan` | 10 KB | Job title master |
| `M_tarik_pegawai` | 9 KB | Pulls employee data from DIKBUD HR REST API |

---

## 📦 Database Schema Overview

Database: `db_app01` (MySQL, 8.6 GB backup)

**Table Prefix Namespacing:**

| Prefix | Meaning | Example Tables |
|--------|---------|----------------|
| `priv_` | Privileges/auth | `priv_t_user`, `priv_t_group`, `priv_t_menu`, `priv_t_sysparam` |
| `kepeg_` | HR/kepegawaian | `kepeg_m_pegawai`, `kepeg_m_jabatan`, `kepeg_m_golongan`, `kepeg_m_unor` |
| `app_` | Treasury core | `app_t_usulan`, `app_m_status`, `app_m_perubahan`, `app_m_jabatan`, `app_m_unor`, `app_m_ttd`, `app_m_informasi`, `app_m_pelatihan` |

---

## 🔗 External Integrations

| Integration | Purpose | Auth |
|-------------|---------|------|
| DIKBUD HR API (`data-sdm.kemdikbud.go.id`) | Pull employee master data | Basic Auth (stored in properties.php) |
| PHPWord (`phpoffice/phpword ^0.18.1`) | Generate .docx SK letters | — |
| mPDF (`mpdf/mpdf ^8.0`) | Generate PDF documents | — |
| PHPMailer | Email notifications for proposal status | SMTP |

---

## 🔍 Architectural Findings & Risk Assessment

### Strengths
1. **HMVC via MX** — Clean module separation (dashboard, kepegawaian, perbend, privileges each isolated)
2. **Autoloaded security** — `check_session_helper` fires on every request providing a global auth guard
3. **Prefix namespacing** — Clear DB table ownership per module (`priv_`, `kepeg_`, `app_`)
4. **Template abstraction** — All views go through `Template::display()`, making theme changes centralized

### Risks & Code Smells
1. **Giant controllers** — `T_usulan_satker.php` (2263 lines), `T_terbit_sk.php` (1646 lines) violate SRP; untestable
2. **Cross-module `require_once`** — `User_authentication` directly `require_once`'s from other modules; hidden coupling
3. **Raw SQL in Template** — `Template::display()` runs raw SQL for breadcrumbs; business logic in view layer
4. **No model layer** — `application/models/` is empty; all DB access is inline in controllers
5. **Duplicate controllers** — Many `*2` variants (`T_usulan_satker2`, `T_usulan_daftar2`, etc.) suggest copy-paste development
6. **Single DB** — All 3 modules share one MySQL database; schema migration is a system-wide risk
7. **Credentials in config** — `properties.php` stores plaintext Basic Auth credentials and API keys

### Recommendations
1. **Extract service layer** — Move business logic from god controllers into service classes
2. **Create model classes** — Move all DB queries into `application/models/` using `CI_Model`
3. **Replace `require_once` with CI Loader** — Use HMVC module loading instead of filesystem includes
4. **Consolidate `*2` variants** — Merge paired controllers using a parameter/strategy pattern
5. **Move credentials to `.env`** — Use environment variables for API keys and passwords

---

## 📁 Output Files

| File | Purpose |
|------|---------|
| `graph.json` | GraphRAG-ready JSON with full nodes/edges/communities |
| `index.html` | Interactive force-directed visualization (dark mode, search, filter, click-to-inspect) |
| `GRAPH_REPORT.md` | This human-readable architectural report |

---

*Generated by Graphify — Antigravity Agent · 2026-08-03*
