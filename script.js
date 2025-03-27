const users = []; // Array para almacenar los usuarios

// Manejar el formulario de CRUD
document.getElementById('crudForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('crudUsername').value;
    const password = document.getElementById('crudPassword').value;

    // Agregar usuario al array
    users.push({ username, password });
    renderTable();
    this.reset(); // Limpiar el formulario
});

// Renderizar la tabla
function renderTable() {
    const tableBody = document.getElementById('crudTableBody');
    tableBody.innerHTML = ''; // Limpiar la tabla

    users.forEach((user, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.username}</td>
            <td>
                <button onclick="editUser(${index})">Editar</button>
                <button onclick="deleteUser(${index})">Eliminar</button>
            </td>
        `;
        tableBody.appendChild(row);
    });
}

// Editar usuario
function editUser(index) {
    const user = users[index];
    document.getElementById('crudUsername').value = user.username;
    document.getElementById('crudPassword').value = user.password;
    deleteUser(index); // Eliminar el usuario actual para actualizarlo
}

// Eliminar usuario
function deleteUser(index) {
    users.splice(index, 1);
    renderTable();
}