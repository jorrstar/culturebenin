@extends('layout')

@section('title', 'Liste des contenus')

@section('content')

<style>
.table-container {
    margin-top: 20px;
}

#searchInput {
    width: 250px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-bottom: 15px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}
.table th {
    background: #2c3e50;
    color: white;
    padding: 10px;
}
.table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}
.table tr:hover {
    background: #f1f1f1;
}
.btn {
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
}
.btn-primary { background: #3498db; }
.btn-warning { background: #f39c12; }
.btn-danger { background: #e74c3c; }

.badge { padding: 4px 8px; border-radius: 4px; color: white; }
.badge-success { background: #27ae60; }
.badge-danger { background: #c0392b; }

.pagination {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 5px;
}
.pagination button {
    padding: 6px 12px;
    border-radius: 4px;
    background: #2c3e50;
    color: white;
    border: none;
}
.pagination button.disabled {
    opacity: 0.4;
    cursor: not-allowed;
}
</style>

<h1>Gestion des contenus</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('contenus.create') }}" class="btn btn-primary">Ajouter un contenu</a>

<div class="table-container">

    <!-- 🔍 Barre de recherche -->
     <div style="text-align: right; margin-bottom: 15px;">
    <input type="text" id="searchInput" placeholder="Rechercher...">
</div>
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Langue</th>
                <th>Région</th>
                <th>Auteur</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Date création</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($contenus as $contenu)
                <tr>
                    <td>{{ $contenu->id_contenu }}</td>
                    <td>{{ $contenu->titre }}</td>
                    <td>{{ $contenu->langue->nom_langue }}</td>
                    <td>{{ $contenu->region->nom_region }}</td>
                    <td>{{ $contenu->auteur->nom }}</td>
                    <td>{{ $contenu->type->nom_contenu }}</td>

                    <td>
                        @if($contenu->statut == 'valide')
                            <span class="badge badge-success">Validé</span>
                        @else
                            <span class="badge badge-danger">En attente</span>
                        @endif
                    </td>

                    <td>{{ $contenu->date_creation }}</td>

                    <td>
                        <a href="{{ route('contenus.show', $contenu->id_contenu) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('contenus.edit', $contenu->id_contenu) }}" class="btn btn-warning">Modifier</a>

                        <form action="{{ route('contenus.destroy', $contenu->id_contenu) }}"
                            method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Supprimer ce contenu ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- 📌 Pagination JS -->
    <div class="pagination" id="pagination"></div>

</div>

<script>
// 🔍 Recherche dynamique
document.getElementById('searchInput').addEventListener('keyup', function () {
    let search = this.value.toLowerCase();
    let rows = document.querySelectorAll('#dataTable tbody tr');

    rows.forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(search) ? '' : 'none';
    });
});

// 📌 Pagination simple JS
const rowsPerPage = 6;
const table = document.getElementById('dataTable');
const rows = table.querySelectorAll('tbody tr');
const pagination = document.getElementById('pagination');
const totalPages = Math.ceil(rows.length / rowsPerPage);

let currentPage = 1;

function showPage(page) {
    currentPage = page;

    let start = (page - 1) * rowsPerPage;
    let end = start + rowsPerPage;

    rows.forEach((row, index) => {
        row.style.display = (index >= start && index < end) ? '' : 'none';
    });

    updatePagination();
}

function updatePagination() {
    pagination.innerHTML = "";

    for (let i = 1; i <= totalPages; i++) {
        let btn = document.createElement('button');
        btn.textContent = i;

        if (i === currentPage) {
            btn.style.background = "#3498db";
        }

        btn.onclick = () => showPage(i);
        pagination.appendChild(btn);
    }
}

// Initialisation
showPage(1);
</script>

@endsection
