const users = []; // Array para almacenar los usuarios
let registeredUser = null; // Usuario registrado

// Mostrar solo el formulario de login al inicio
document.getElementById('loginContainer').style.display = 'block';

// Manejar el formulario de login
document.getElementById('loginForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Evitar el envío predeterminado del formulario
    const username = document.getElementById('registerUsername').value;
    const password = document.getElementById('registerPassword').value;

    try {
        const response = await fetch('Login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({ username, password }),
        });

        const result = await response.json();

        if (response.ok && result.status === 'success') {
            window.location.href = result.redirect; // Redirigir al home si las credenciales son correctas
        } else {
            alert(result.message); // Mostrar mensaje de error del servidor
        }
    } catch (error) {
        console.error('Error al iniciar sesión:', error);
        alert('Error al iniciar sesión. Inténtalo de nuevo.');
    }
});

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

// Mostrar el formulario de "Crear Cuenta"
document.getElementById('createAccountButton').addEventListener('click', function() {
    document.getElementById('loginContainer').style.display = 'none';
    document.getElementById('createAccountContainer').style.display = 'block';
});

// Manejar el formulario de "Crear Cuenta"
document.getElementById('createAccountForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    const newUsername = document.getElementById('newUsername').value;
    const newPassword = document.getElementById('newPassword').value;

    try {
        const response = await fetch('Registro.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({ username: newUsername, password: newPassword }),
        });

        const result = await response.text();
        alert(result);

        if (response.ok) {
            document.getElementById('createAccountContainer').style.display = 'none';
            document.getElementById('loginContainer').style.display = 'block';
        }
    } catch (error) {
        console.error('Error al registrar cuenta:', º);
        alert('Error al registrar cuenta. Inténtalo de nuevo.');
    }
});

// Volver al formulario de login desde "Crear Cuenta"
document.getElementById('backToLoginButton').addEventListener('click', function() {
    document.getElementById('createAccountContainer').style.display = 'none';
    document.getElementById('loginContainer').style.display = 'block';
});