<?php
include_once 'connect.php'; 
$conn = connect();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO brand(brand) VALUES (?)");
    $stmt->bind_param("s", $brand);

    // Set parameters and execute
    $brand = $_POST['brand-name'];

    // Execute SQL query
    $stmt->execute();
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Brand You Succesfully",
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                window.location="login.php";
            });
        });
        </script>';

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="">
				<a href="index.html">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="#" class="dropdown-toggle">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Brands</span>
					<i class='bx bx-chevron-down'></i>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#">Create Brand</a></li>
					<li><a href="managebrand.html">Manage Brand</a></li>
				</ul>
			</li>
			<li>
				<a href="#" class="dropdown-toggle">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Cars</span>
					<i class='bx bx-chevron-down'></i>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#">Create Cars</a></li>
					<li><a href="#">Manage cars</a></li>
				</ul>
			</li>
			
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Manage Bookings</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Manage feedback</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png" alt="Profile">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Create Brand</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Brand</a></li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li><a class="active" href="#">Create Brand</a></li>
                    </ul>
                </div>
            </div>

            <!-- FORM CONTENT -->
            <div class="form-container">
                <div class="form-box">
                    <form action="brand.php" method="post">
                        <label for="brand-name">Brand Name</label>
                        <input type="text" id="brand-name" name="brand-name" required>


                        <button type="submit" class="btn-submit">Create Brand</button>
                    </form>
                </div>
            </div>
            <!-- FORM CONTENT -->

        </main>
    </section>
	<script src="script.js"></script>
</body>
</html>