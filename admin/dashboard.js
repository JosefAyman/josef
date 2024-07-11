document.addEventListener('DOMContentLoaded', () => {
    // Simulated data
    const users = [
        { id: 1, username: 'User1' },
        { id: 2, username: 'User2' }
    ];

    const posts = [
        { id: 1, content: 'Post 1 content' },
        { id: 2, content: 'Post 2 content' }
    ];

    const likedPosts = [
        { id: 1, content: 'Liked Post 1 content' },
        { id: 2, content: 'Liked Post 2 content' }
    ];

    const usersTable = document.querySelector('#usersTable tbody');
    const postsTable = document.querySelector('#postsTable tbody');
    const likedPostsTable = document.querySelector('#likedPostsTable tbody');

    // Function to render user rows
    function renderUsers() {
        usersTable.innerHTML = '';
        users.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.id}</td>
                <td>${user.username}</td>
                <td>
                    <button class="actionBtn delete" onclick="deleteUser(${user.id})">Delete</button>
                    <button class="actionBtn ban" onclick="banUser(${user.id})">Ban</button>
                </td>
            `;
            usersTable.appendChild(row);
        });
    }

    // Function to render post rows
    function renderPosts() {
        postsTable.innerHTML = '';
        posts.forEach(post => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${post.id}</td>
                <td>${post.content}</td>
                <td>
                    <button class="actionBtn delete" onclick="deletePost(${post.id})">Delete</button>
                    <button class="actionBtn edit" onclick="editPost(${post.id})">Edit</button>
                </td>
            `;
            postsTable.appendChild(row);
        });
    }

    // Function to render liked posts
    function renderLikedPosts() {
        likedPostsTable.innerHTML = '';
        likedPosts.forEach(post => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${post.id}</td>
                <td>${post.content}</td>
            `;
            likedPostsTable.appendChild(row);
        });
    }

    // Initial render
    renderUsers();
    renderPosts();
    renderLikedPosts();

    // Mock functions for actions
    window.deleteUser = function(id) {
        alert(`Deleting user with id: ${id}`);
    }

    window.banUser = function(id) {
        alert(`Banning user with id: ${id}`);
    }

    window.deletePost = function(id) {
        alert(`Deleting post with id: ${id}`);
    }

    window.editPost = function(id) {
        alert(`Editing post with id: ${id}`);
    }

    document.getElementById('logoutBtn').addEventListener('click', () => {
        alert('Logging out');
    });
});
