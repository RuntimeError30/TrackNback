<?php
require 'config.php';
if(!empty($_SESSION["Email"])){
  $Email = $_SESSION["Email"];
  
  $result = mysqli_query($conn, "SELECT * FROM Users WHERE Email = '$Email'");
  $row = mysqli_fetch_assoc($result);

  

  
}
else{
  header("Location: landing.php");
}




$ID = $row["ID"];
  $Name = $row["Name"];
  $Email = $row["Email"];
  $Mobile = $row["Mobile"];


  $UserFetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Users WHERE ID = '$ID'"));



  // Post a lost item






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
</style>
<body>
    <section class="flex bg-slate-100" style="font-family: 'Montserrat', sans-serif;">

        <!-- SIDEBAR HAT DIBINA -->
        <div id="sidebar" class="grid justify-between bg-black h-full mt-5 ml-5 rounded-xl text-white col-span-2 " style="width:40px">
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
                        <h1 class="uppercase font-thin text-2xl border-b  border-slate-500">TrackNback</h1>
    
    
    
    
    
    
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
                    <h1 class=" mb-2 rounded-xl text-xs">Basic </h1>
    
                    <a href="" class="hover:text-orange-500 transition-all ease-in-out">
                        <div class="flex items-center mb-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                              </svg>
                              <h1 class="ml-3 ">Profile</h1>
                        </div>
                    </a>

    
    
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                          </svg>
                          
                          <h1 class="ml-3">Record</h1>
                    </div>
    
    
    
    

                </div>
    
    
    
    
                <div class="flex flex-col justify-start ml-8 mt-10" id="Categobar">
                    <h1 class=" mb-2 rounded-xl text-xs">CATEGORIES </h1>
    
                    <div class=" mb-2 ">
                        <a href="UserSettings.php" class="flex items-center" >
    
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
                          </svg>
                          
                          <h1 class="ml-3">Settings</h1>
    
    
    
    
                              
                        </a>
    

                    </div>
    
    

                    <a href="community.php">
                    <div class=" mb-2">
                        <button class="flex items-center" onclick="PageshowOpt()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                          </svg>
                          
                          <h1 class="ml-3">Community</h1>
    

    
                        </button>
                    </div>
                    </a>
    
    
    
    
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                          </svg>
                          
                          
                          <h1 class="ml-3">Message</h1>
                    </div>
                </div>
                
    

                <a href="logout.php">
                <div class="flex ml-8 mb-10 mt-40 hover:">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                      </svg>
    
                      <h1>Logout</h1>
                </div>
                </a>
            </div>
        </div>

        <!-- SIDEBAR HAT DIBINA -->


        <div class=" mt-5 ml-5 w-full h-full mr-10">
            
            <div class="w-full flex justify-center ">
                <nav class="w-2/3 p-5 items-center rounded-xl bg-gradient-to-r from-[#fc4a1a] to-[#b20a2c] text-white flex justify-between">
                    <div>
                        <h1 class="uppercase font-base text-2xl border-slate-500 ">TrackNback</h1>
                        
                    </div>

                    <ul class=" flex space-x-5">
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                          </li>

                          <li>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              
                          </li>
                    </ul>
                </nav>
            </div>




            <!-- ekhanee kaj korbii -->
            <div class="mt-10  h-[52rem] overflow-scroll flex">



                <div class="w-full h-full">

                <h1>Select Categgory to sort</h1>

                <form action="" method="get">
                <select name="categoriesInp" id="" class="border p-4 rounded-xl">
                <option value="null">Select Category</option>
                <?php

                    $categoryQuery = "SELECT NewCategory FROM Category";
                    $categoryResult = mysqli_query($conn, $categoryQuery);

                    while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                    $newCategory = $categoryRow["NewCategory"];
                    echo "<option value='$newCategory'>$newCategory</option>";
                     }
                ?>
                </select>



                <button type="submit" name="filterbtn">Filter Posts</button>
                </form>
                    




                    <div class="w-full h-fit p-5 bg-white grid mt-10">
                    <?php

                        if(isset($_GET['categoriesInp'])){
                            $SelectedCategories = $_GET['categoriesInp'];

                            $aStatus = "Approved";
                            $query1 = "SELECT * FROM lostposts WHERE ItemCategory ='$SelectedCategories' AND approveStatus = '$aStatus'";
                            $result = $conn->query($query1);

                   
                    while($postFetch = $result->fetch_assoc()){
                        ?>
                        <div class="w-full mb-5 rounded-xl shadow-lg h-fit p-5 bg-white " >
                            <div class="flex  items-center">
                                <img src="" alt="" class="aspect-square object-cover w-10 rounded-full">
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
                                <a href="sendNotification.php?ItemID=<?php echo $postFetch["ItemID"]; ?>&&FounderID=<?php echo $row["ID"]?>&&OwnerID=<?php echo $postFetch["OwnerID"]?>" class="w-full text-white bg-red-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">I've Found it!</a>

                               
                               </div>
                            </div>
                        </div>

                            

                    <?php
                    }
                    ?> 



                    <?php
                    }else{
                        $aStatus1 = "Approved";
                            $query2 = "SELECT * FROM lostposts WHERE approveStatus = '$aStatus1'";
                            $result = $conn->query($query2);

                   
                    while($postFetch = $result->fetch_assoc()){
                        ?>





                        <div class="w-full mb-5 rounded-xl shadow-lg h-fit p-5 bg-white " >
                            <div class="flex  items-center">
                                <img src="" alt="" class="aspect-square object-cover w-10 rounded-full">
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
                                <a href="sendNotification.php?ItemID=<?php echo $postFetch["ItemID"]; ?>&&FounderID=<?php echo $row["ID"]?>&&OwnerID=<?php echo $postFetch["OwnerID"]?>" class="w-full text-white bg-red-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">I've Found it!</a>

                               
                               </div>
                            </div>
                        </div>


                    
                    <?php
                    }
                    ?>
                      <?php
                    }
                    ?>  
                    </div>
                </div>




                <!-- Profile details -->


                
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












                  