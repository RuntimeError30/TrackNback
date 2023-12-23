<?php
require 'config.php';
if(!empty($_SESSION["Email"])){
  $Email = $_SESSION["Email"];
  
  $result = mysqli_query($conn, "SELECT * FROM admintab WHERE Email = '$Email'");
  $row = mysqli_fetch_assoc($result);

  




  
}
else{
  header("Location: landing.php");
}


$ID = $row["ID"];


// Counting members
$numberFetch = "SELECT COUNT(*) AS row_count FROM users";
$resultNum = mysqli_query($conn, $numberFetch);
if ($resultNum) {
  $rowPep = mysqli_fetch_assoc($resultNum);
  $rowCount = $rowPep['row_count'];
}


//counting Found items
$lostFetch = "SELECT COUNT(*) AS foundIT FROM lostposts WHERE itemStatus='FOUND!'";
$lostNum = mysqli_query($conn, $lostFetch);
if ($lostNum) {
  $lostPep = mysqli_fetch_assoc($lostNum);
  $lostCount = $lostPep['foundIT'];
}


//counting lost items
$lostFetch1 = "SELECT COUNT(*) AS lostIT FROM lostposts WHERE itemStatus!='FOUND!'";
$lostNum1 = mysqli_query($conn, $lostFetch1);
if ($lostNum1) {
  $lostPep1 = mysqli_fetch_assoc($lostNum1);
  $lostCount1 = $lostPep1['lostIT'];
}







if(isset($_POST["AdminChange"])){
    $AdminName = $_POST["AdminName"];
$AdminMobile = $_POST["AdminMobile"];
$AdminEmail = $_POST["AdminEmail"];
$AdminPassword = $_POST["AdminPassword"];
$AdminRole = $_POST["Role"];

$ID = uniqid();




$InsertTab = mysqli_query($conn, "SELECT * FROM admintab WHERE ID = '$ID'");

if(mysqli_num_rows($InsertTab)>0){
    echo "<div style= 'font-family: CharukolaUltraLight, sans-serif;' class=''>
    <h1 class= '  flex justify-center relative left-80 top-96 translate-y-44'>Already Inserted Account</h1>
    </div>";
   

}
else{
    
    $InsertTab1 = mysqli_query($conn, "INSERT INTO admintab(Name, Mobile, ID, Email, Password, Position) VALUES ('$AdminName','$AdminMobile','$ID','$AdminEmail','$AdminPassword','$AdminRole')");
    
    
}

}
// Update About us

if(isset($_POST["aboutUs"])){
    $AboutBox = $_POST["AboutBox"];



    $UpdateQueryAbout= mysqli_query($conn, "UPDATE aboutus SET Description ='$AboutBox'");
}





?>















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Sidebar</title>
</head>
<style>
    ::-webkit-scrollbar {
    display: none;
}


#grad{
    background: linear-gradient(to  right, #ff7300 , #333399);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;

}
</style>
<body>
    <section class="flex bg-slate-950 text-white" style="font-family: 'Montserrat', sans-serif;">

        <!-- SIDEBAR HAT DIBINA -->
        <div id="sidebar" class="grid items-center justify-between bg-black h-screen text-white " style="width:40px">
            <div class="flex flex-col justify-center">

                <button class="bg-black-500 w-fit p-3 rounded-full relative top-[25rem]" onclick="OpenSide()" id="openBtnSide">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                      </svg>
                </button>
                  
            </div>
            <div class="" id="mainDIV" style=" visibility: hidden;">

                <div class="flex flex-col items-center p-5" >


                    <div class="flex items-center space-x-7" id="titleBar">
                        <a href="adminDashboard.php" class="uppercase font-thin text-2xl border-b  border-slate-500">TrackNback</a>
    
    
    
    
    
    
                        <button class="" onclick="closeBtn()" >
                            <div class="bg-black p-2 rounded-2xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                  </svg>
                            </div>
                        </button>
                    </div>
                      
                </div>
    
                <div class="flex flex-col justify-start ml-8 mt-60" id="maintainSide">
                    <h1 class=" mb-2 rounded-xl text-xs">MAINTAINENCE </h1>
    
                    <div class="flex items-center mb-2 ">

                    <a href="UserList.php" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                          </svg>
                          <h1 class="ml-3">User</h1>
                    </a>
                    </div>
    
    
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                          </svg>
                          
                          <h1 class="ml-3">Contact</h1>
                    </div>
    
    
    
    
                    <div class="flex items-center mb-2">
                        <a href="postApproval.php" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                          </svg>
                          
                          <h1 class="ml-3">Post Approval</h1>
                        </a>

                    </div>
                </div>
    
    
    
    
                <div class="flex flex-col justify-start ml-8 mt-10" id="Categobar">
                    <h1 class=" mb-2 rounded-xl text-xs">CATEGORIES </h1>
    
                    <div class=" mb-2 ">
                        <button class="flex items-center" onclick="showOpt()">
    
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
                          </svg>
                          
                          <h1 class="ml-3">Items</h1>
    
    
    
    
                          
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>
                              
                          </button>
    
                          <ul class="p-3 hidden bg-stone-800 rounded-xl" id="dropOptions">
                            <li>
                                <a href="" class="flex items-center space-x-1 mb-2
                                ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                      <h1 class="text-sm ">Add</h1>
                                    </a>
                            </li>
                            <li>
                                <a href="" class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                      </svg>
                                      
                                      <h1 class="text-sm ">List</h1>
                                    </a>
                            </li>
                          </ul>
                    </div>
    
    
                    <div class=" mb-2">
                        <button class="flex items-center" onclick="PageshowOpt()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                          </svg>
                          
                          <h1 class="ml-3">Pages</h1>
    
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-1 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                          </svg>
    
                        </button>
    
    
                        <ul class="p-3 hidden bg-stone-800 rounded-xl" id="PagesdropOptions">
                            <li>
                                <a href="" class="flex items-center space-x-1 mb-2
                                ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                      <h1 class="text-sm ">Welcome Page</h1>
                                    </a>
                            </li>
                            <li>
                                <a href="" class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                      </svg>
                                      
                                      <h1 class="text-sm ">About Page</h1>
                                    </a>
                            </li>
                          </ul>
                    </div>
    
    
    
    
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                          </svg>
                          
                          
                          <h1 class="ml-3">Message</h1>
                    </div>
                </div>
                
    
                <div class="flex ml-8 mb-10 mt-40 hover:">

                <a href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                      </svg>
    
                      <h1>Logout</h1>
                </a>
                </div>
            </div>
        </div>

        <!-- SIDEBAR HAT DIBINA -->


        <div class="  ml-5 w-full h-full mr-10  h-screen overflow-y-scroll">
            
            




            <!-- ekhanee kaj korbii -->
            <div class="mt-10  w-fit rounded-xl">
                <div class="flex text-xs">
                    <h1 class="text-blue-400">Dashboard/</h1>
                    <h1>Post Approval</h1>
                </div>

                <h1 class="tracking-wider uppercase">TrackNback Admin Portal</h1>
            </div>


            <div class="mt-2 bg-slate-900 shadow-xl  p-3 rounded-xl flex items-center space-x-2">
                <div>
                    <img src="imgs/woman.png" alt="" class="aspect-square object-cover rounded-full w-24 border border-slate-800 shadow-xl">
                </div>
                <div>
                    <h1 class="text-xs">Welcome,</h1>
                    <h1 class="uppercase text-base"><?php echo $row["Name"]; ?></h1>
                    <h1 class="text-xs"><?php echo $row["Position"]; ?>, TrackNBack</h1>
                </div>

            </div>

            <div class="flex space-x-5 items-center mt-5">
                <div class="border border-slate-800 shadow-xl p-5 w-full rounded-xl bg-slate-900 shadow-xl bg-gradient-to-r from-slate-950 to-blue-900">
                    <h1 class="text-xs uppercase ">Total Lost Items</h1>
                    <h1 class="text-5xl uppercase font-extrabold" id="grad"><?php echo $lostCount1?></h1>
                </div>

                <div class="border border-slate-800 shadow-xl p-5 w-full rounded-xl bg-slate-900 shadow-xl bg-gradient-to-r from-slate-950 to-blue-900">
                    <h1 class="text-xs uppercase ">Total Found Marked Items</h1>
                    <h1 class="text-5xl uppercase font-extrabold" id="grad"><?php echo $lostCount?></h1>
                </div>

                <div class="border border-slate-800 shadow-xl p-5 w-full rounded-xl bg-slate-900 shadow-xl bg-gradient-to-r from-slate-950 to-blue-900">
                    <h1 class="text-xs uppercase ">Total Users</h1>
                    <h1 class="text-5xl uppercase font-extrabold" id="grad"><?php echo $rowCount?></h1>
                </div>

            </div>



            <div class="w-1/2 mt-5">
                <h1>Pending Posts for Approve</h1>

                <?php
                   $aStatus = "Approved";
                   $aStatus2 = "Declined";
                   $query1 = "SELECT * FROM lostposts 
                   WHERE (approveStatus != '$aStatus' AND approveStatus != '$aStatus2') OR approveStatus IS NULL";
                   
                   $result = $conn->query($query1);

                   
                    while($postFetch = $result->fetch_assoc()){
                        ?>
                        <div class="w-full mb-5 rounded-xl shadow-lg h-fit p-5 " >
                            <div class="flex  items-center">
                                <img src="imgs/darain.jpg" alt="" class="aspect-square object-cover w-10 rounded-full">
                                <h1 class="ml-3 text-xl uppercase"><?php echo $postFetch["OwnerName"]; ?></h1>

                            </div>

                            <div class="mt-5 grid">
                                <h1 ><?php echo $postFetch["Description"]; ?></h1>
                                <img src="imgs/<?php echo $postFetch["itemImage"]; ?>" alt="" class="aspect-square object-cover w-80 rounded-xl">
                            </div>

                            <div>
                               <div>
                                <h1>Status: </h1>
                                <h1 class="text-lime-500"><?php echo $postFetch["itemStatus"]; ?></h1>
                               </div>


                               <div class="flex space-x-10">
                                <a href="declinePost.php?ItemID=<?php echo $postFetch["ItemID"]; ?>" class="w-1/2 text-white bg-red-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Decline Post</a>

                                <a href="approvePost.php?ItemID=<?php echo $postFetch["ItemID"]; ?>" class="w-1/2 text-white bg-lime-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Approve Post </a>
                               </div>
                            </div>
                        </div>


                    <?php
                    }
                    ?>  
                
            </div>
        </div>
    </section>
    
</body>


<script>
    function showOpt(){

        //Items er jonne 
        var dropOptions = document.getElementById('dropOptions');
        if(dropOptions.style.display === "block"){
            dropOptions.style.display = "none";
        }
        else{
            dropOptions.style.display ="block";
        }
    }


    function PageshowOpt(){
        var dropOptions = document.getElementById('PagesdropOptions');
        if(dropOptions.style.display === "block"){
            dropOptions.style.display = "none";
        }
        else{
            dropOptions.style.display ="block";
        }

    }

    function closeBtn(){
        document.getElementById('sidebar').style.width="40px";
        document.getElementById('mainDIV').style.visibility="hidden";
        document.getElementById('openBtnSide').style.display="block";
        
    }

    function OpenSide(){
        document.getElementById('sidebar').style.width="250px";
        document.getElementById('openBtnSide').style.display="none";
        document.getElementById('mainDIV').style.visibility="visible";
    
    }
</script>
</html>



