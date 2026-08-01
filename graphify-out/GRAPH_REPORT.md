# Graphify Architectural Report: Siperben System

## Executive Summary
This report presents the knowledge graph and architectural analysis extracted from the **Siperben** (Sistem Informasi Perbendaharaan & Kepegawaian) codebase. The application is built on **CodeIgniter 3** utilizing a **Modular (HMVC)** design pattern, dividing business logic into domain-specific modules: Perbendaharaan, Kepegawaian, Privileges, Dashboard, and Public/Auth Actions.

---

## Key Graph Metrics
- **Total Nodes Analyzed**: 280
- **Total Architectural Edges**: 331
- **Architectural Communities Identified**: 9
- **Primary Framework**: CodeIgniter 3 HMVC (Wiredesignz Modular Extensions)

---

## Community Breakdown
- **Configuration**: 19 components
- **General & Infrastructure**: 98 components
- **System Core**: 11 components
- **Shared Utilities**: 11 components
- **Dashboard & Analytics**: 8 components
- **Kepegawaian (HR & Staff)**: 16 components
- **Public & Auth Actions**: 4 components
- **Perbendaharaan (Treasury & SK)**: 95 components
- **Privileges & User Mgmt**: 18 components

---

## Architectural God Nodes
God nodes are central components with exceptionally high connectivity (in-degree/out-degree), representing core system dependencies, critical data tables, or primary workflow orchestrators.

| Node ID | Type | Community | Degree | Structural Role |
|---------|------|-----------|--------|-----------------|
| `MX_Controller` | core | System Core | 78 | Central Orchestrator / Table |
| `db:app_t_usulan_pegawai` | database_table | Dashboard & Analytics | 30 | Central Orchestrator / Table |
| `db:app_m_jabatan` | database_table | Dashboard & Analytics | 27 | Central Orchestrator / Table |
| `db:app_m_unor` | database_table | General & Infrastructure | 21 | Central Orchestrator / Table |
| `db:app_t_usulan` | database_table | General & Infrastructure | 17 | Central Orchestrator / Table |
| `db:priv_t_user` | database_table | General & Infrastructure | 14 | Central Orchestrator / Table |
| `T_usulan_satker` | controller | Perbendaharaan (Treasury & SK) | 14 | Central Orchestrator / Table |
| `db:kepeg_m_unor` | database_table | General & Infrastructure | 12 | Central Orchestrator / Table |
| `for` | script | General & Infrastructure | 11 | Central Orchestrator / Table |
| `db:kepeg_m_pegawai` | database_table | Kepegawaian (HR & Staff) | 11 | Central Orchestrator / Table |
| `T_terbit_sk` | controller | Perbendaharaan (Treasury & SK) | 11 | Central Orchestrator / Table |
| `db:the` | database_table | Shared Utilities | 10 | Central Orchestrator / Table |
| `db:app_notification` | database_table | General & Infrastructure | 10 | Central Orchestrator / Table |
| `Detail_sk_kemdikbud` | controller | Perbendaharaan (Treasury & SK) | 9 | Central Orchestrator / Table |
| `T_terbit_sk_upload` | controller | Perbendaharaan (Treasury & SK) | 9 | Central Orchestrator / Table |

---

## Architectural Modules Overview

### 1. Perbendaharaan (Treasury & SK Management)
- **Primary Controllers**: `T_terbit_sk`, `T_usulan_satker`, `T_usulan_approval`, `Cetak_sk_satker`, `M_unor_rekening`.
- **Core Functionality**: Manages Treasury SK issuance, Satker proposal submission, approval workflows, certificate/SK generation, and account unit mapping.
- **Key Tables**: `db:t_usulan_satker`, `db:t_terbit_sk`, `db:m_unor`, `db:m_rekening`.

### 2. Kepegawaian (HR & Staffing)
- **Primary Controllers**: `M_pegawai`, `M_jabatan`, `M_golongan`, `M_kepegawaian_unor`, `Lookup_unor`.
- **Core Functionality**: Employee master records, position mappings, civil servant ranks, unit organization synchronization.
- **Key Tables**: `db:m_pegawai`, `db:m_jabatan`, `db:m_unor`.

### 3. Privileges & Access Control
- **Primary Controllers**: `User_authentication`, `User`, `Group`, `Menu`, `Approval_pengguna`.
- **Core Functionality**: User authentication, RBAC permission assignment, menu authorization, account approvals.
- **Key Tables**: `db:sys_user`, `db:sys_group`, `db:sys_menu`.

### 4. Dashboard & Analytics
- **Primary Controllers**: `Index`, `Laporan_dashboard`, `Detail_laporan_dashboard`.
- **Core Functionality**: Aggregated visual stats for SK issuance progress, proposal status counts, and executive summary tables.

---

## Traversal & Query Guidance

### Finding Shortest Path
To trace dependencies between authentication and treasury SK issuance:
```bash
/graphify path "User_authentication" "T_terbit_sk"
```

### Deep Exploration
To explore all incoming/outgoing dependencies for employee master data:
```bash
/graphify explain "M_pegawai"
```

---

## Audit Trail & Extraction Details
- **Extraction Timestamp**: 2026-08-01T15:06:29.642Z
- **Scanner Engine**: Local CodeIgniter AST & Regex Parser
- **Output Artifacts**:
  - `graphify-out/graph.json` (GraphRAG schema)
  - `graphify-out/index.html` (Interactive visual explorer)
  - `graphify-out/GRAPH_REPORT.md` (Architectural report)
