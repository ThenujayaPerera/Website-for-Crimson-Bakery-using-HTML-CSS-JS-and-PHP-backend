<?php 
session_start();
if(!isset($_SESSION["user_login"])){
    header("location:Adminlogin.html");
    exit();
}
include("./DBconnection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crimson Bakery - Admin Details Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css">
    <style>
        
        body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    /* NAVIGATION BAR  */
    .bar {
      height: 100px;
      background-color: rgb(161, 30, 56);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
    }

    .logo img {
      width: 180px;
      height: auto;
    }

    .header-links {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .header-links a {
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      font-weight: bold;
      transition: color 0.3s;
    }

    .header-links a:hover {
      color: #410d0c;
    }

    /* ==========================================
       MAIN CONTENT
    ========================================== */
    .admin-main-content {
      padding-top: 120px;
      display: flex;
      justify-content: center;
      min-height: 100vh;
    }

    .content-area {
      width: 90%;
      max-width: 1200px;
    }

    /* ==========================================
       SECTION HEADERS & CARDS
    ========================================== */
    .section-header {
      color: rgb(161, 30, 56);
      border-bottom: 3px solid #fbbaba;
      padding-bottom: 10px;
      margin-bottom: 20px;
      text-align: center;
    }

    .dashboard-card {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      text-align: center;
    }

    .dashboard-card h3 {
      color: #8b0705;
      margin-top: 0;
    }

    .dashboard-card p {
      font-size: 36px;
      font-weight: bold;
      color: rgb(161, 30, 56);
    }

    .card-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }

    /* ==========================================
       TABLE STYLING
    ========================================== */
    .data-table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      border-radius: 8px;
      overflow-x: auto;
    }

    .data-table th, .data-table td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    .data-table th {
      background-color: rgb(161, 30, 56);
      color: white;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 14px;
    }

    .data-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    /* Highlight new row */
    .new-user-row {
      background-color: #ffe0e0;
      border-top: 2px solid rgb(161, 30, 56);
    }

    .new-user-row input, 
    .new-user-row select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      width: 90%;
      box-sizing: border-box;
    }

    .data-table tr:hover:not(.new-user-row) {
      background-color: #f1f1f1;
    }

    /* ==========================================
       BUTTONS
    ========================================== */
    .action-button {
      padding: 5px 10px;
      margin-right: 5px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s;
    }

    .edit-btn {
      background-color: #cd1e1e;
      color: white;
    }
    .edit-btn:hover { background-color:#8b0705; }

    .delete-btn {
      background-color: #f44336;
      color: white;
    }
    .delete-btn:hover { background-color: #8b0705; }

    .add-new-admin-btn {
      background-color: rgb(161, 30, 56);
      color: white;
      padding: 8px 15px;
      border-radius: 4px;
      font-weight: bold;
      width: 100%;
      box-sizing: border-box;
    }
    .add-new-admin-btn:hover { background-color: #8b0705; }

    /* ==========================================
       RESPONSIVE DESIGN
    ========================================== */
    @media (max-width: 992px) {
      .header-links {
        gap: 10px;
      }

      .header-links a {
        font-size: 14px;
      }

      .logo img {
        width: 150px;
      }

      .data-table th, .data-table td {
        font-size: 13px;
        padding: 8px;
      }
    }

    @media (max-width: 768px) {
      .bar {
        flex-direction: column;
        height: auto;
        padding: 10px;
        text-align: center;
      }

      .header-links {
        flex-direction: column;
        gap: 10px;
      }

      .data-table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
    }

    @media (max-width: 480px) {
      .data-table th, .data-table td {
        font-size: 12px;
        padding: 6px;
      }

      .add-new-admin-btn {
        font-size: 12px;
        padding: 6px;
      }
    }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="bar">
            <div class="logo">
                <a href="Homeloged.php">
                    <img src="logo.jpg" alt="Crimson Bakery Admin Logo">
                </a>
            </div>
            <div class="header-links">
                
                <a href="admin_dashboard.php"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
                <a href="Adminlogin.html"><i class="fa-solid fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="admin-main-content"> 
        <div class="content-area"> 
            
            <section id="admin-management">
                <h2 class="section-header">Manage User Accounts</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query="SELECT * FROM admin";
                        $result=mysqli_query($conn,$query);
                        
                        while($row=mysqli_fetch_array($result)){
                            echo"
                        
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['role']}</td>
                            <td>{$row['address']}</td>
                            ";
                            echo "<form method='POST' action='Adminmanageprocess.php'>";

                           echo "<td>";
                               echo " <button class=\"action-button edit-btn\" name=\"edit_admin\" value=\"{$row['id']}\" type=\"submit\"><i class=\"fa-solid fa-edit\"></i> Edit</button>";
                               echo "  <button class=\"action-button delete-btn\" name=\"delete_admin\" value=\"{$row['id']}\" type=\"submit\"><i class=\"fa-solid fa-trash-alt\"></i> Delete</button>";
                           echo " </td>";
                          
                        echo "</tr>";
                           
                        }
                        

                        ?>


                        
                        <tr class="new-user-row" >
                            <td><input type="password" placeholder="Password" name="password" ></td>
                            <td><input type="text" placeholder="Full Name" name="full_name" ></td>
                            <td><input type="email" placeholder="Email Address" name="email" ></td>
                            <td>
                                <select name="role" name="role" >
                                    <option value="Manager">Manager</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </td>
                            <td><input type="text" placeholder="Address" name="address" ></td>
                            <td>
                                <button class="action-button add-new-admin-btn" type="submit" name="add_admin"><i class="fa-solid fa-user-plus"></i> Add New User</button>
                            </td>
                        </tr>
                        </form>
                    </tbody>
                </table>
            </section>
            
        </div>
    </div>
    </body>
</html>

