<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $Name = $_POST["Name"];
    $ID = $_POST["ID"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $ReNewPassword = $_POST["confirmPassword"];

    // Hash the password for better security
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM Users WHERE Email = ?");
    mysqli_stmt_bind_param($stmt, 's', $Email);
    mysqli_stmt_execute($stmt);
    $result1 = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result1) > 0) {
        echo "You already have an account. Please login to continue";
    } else {
        // Check if passwords match
        if ($Password == $ReNewPassword) {
            // Insert user data using prepared statement to prevent SQL injection
            $stmtInsert = mysqli_prepare($conn, "INSERT INTO Users (Name, ID, Email, Password) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmtInsert, 'ssss', $Name, $ID, $Email, $hashedPassword);

            if (mysqli_stmt_execute($stmtInsert)) {
                echo "Registration Successful";
            } else {
                echo "Registration Failed: " . mysqli_stmt_error($stmtInsert);
            }

            mysqli_stmt_close($stmtInsert);
        } else {
            echo "Passwords do not match";
        }
    }

    mysqli_stmt_close($stmt);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Serif:opsz@12..24&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registration</title>
</head>
<body>
    <section class="bg-gray-50 dark:bg-gray-900" style="font-family: 'Montserrat', sans-serif; ">


        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                
                <h1>TracknBack</h1>   
            </a>

            <div class="flex w-full justify-center">
                <div class="">
                    <img src="imgs/phn.jpg" alt="" class="aspect-square object-cover w-[42rem] ">
    
                </div>
    
                <div class="w-full flex  bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    
    
    
                    <div class="p-6 w-full space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Create an account
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="#" method="POST">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name</label>
                                <input type="text" name="Name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Smith" required="">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your official email</label>
                                <input type="email" name="Email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@bscse.uiu.ac.bd" required="">
                            </div>


                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your student ID</label>
                                <input type="text" name="ID" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="011234456" >
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="Password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>
                            <div>
                                <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                                <input type="password" name="confirmPassword" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            </div>

                            <button type="submit" name="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Already have an account? <a href="login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>
    
</body>
</html>