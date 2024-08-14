<?php
$query = "SELECT * FROM users";
$result = mysqli_query($connect, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($connect));
}
?>


<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        vertical-align: middle;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    /* Responsive table styles */
    .table-responsive {
        overflow-x: auto;
    }

    @media (max-width: 576px) {
        .table thead {
            display: none;
        }

        .table tr {
            display: block;
            margin-bottom: 15px;
        }

        .table td {
            display: block;
            text-align: right;
            font-size: 14px;
            position: relative;
            padding-left: 50%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-weight: bold;
            text-align: left;
        }
    }
</style>
<div class="container mt-4">
    <h1 class="mb-4">Manage Users</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td>
                            <form action="../user_management/update_role.php" method="post" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <select name="new_role" class="form-control form-control-sm">
                                    <option value="user" <?php echo $row['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    <option value="admin" <?php echo $row['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="manager" <?php echo $row['role'] == 'manager' ? 'selected' : ''; ?>>Manager</option>
                                    <option value="super_manager" <?php echo $row['role'] == 'super_manager' ? 'selected' : ''; ?>>Super Manager</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm mt-2">Update Role</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>