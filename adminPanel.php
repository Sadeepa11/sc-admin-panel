<?php

require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body class="container-fluid">
    <div class="col-12 vh-100">
        <div class="row">

            <!--  -->



            <div class="d-none d-lg-none d-md-none d-xl-none col-7  vh-100 fixed" id="smNav" style="background-color: #e46161; z-index:1;">

                <div class="row">

                    <div class="col-10 logo ">

                    </div>
                    <div class="col-2 fs-3">
                        <i class="bi bi-x-lg" onclick="changeView();"></i>

                    </div>
                    <div class="col-11  mt-5 link actived" id="dashboard">
                        <div class="row">
                            <div class="col-4  linkImg1 fs-1"><i class="bi bi-speedometer2"></i></div>
                            <label class="col-7 fs-5   linkTxt" style="cursor: pointer;" onclick="changeView2('d');">Dashboard</label>
                        </div>

                    </div>
                    <div class="col-11 link " id="users">
                        <div class="row">
                            <div class="col-4  linkImg2 fs-1"><i class="bi bi-file-earmark-check"></i></div>
                            <label class="col-7 fs-5   linkTxt" style="cursor: pointer;" onclick="changeView2('mp');">Posts</label>
                        </div>
                    </div>
                    <div class="col-11  link " id="chat">
                        <div class="row">
                            <div class="col-4  linkImg4 fs-1"><i class="bi bi-chat-dots"></i></div>
                            <label class="col-7 fs-5   linkTxt" style="cursor: pointer;" onclick="changeView2('c');">Chat</label>
                        </div>
                    </div>
                    <div class="col-11 logOut ">
                        <div class="row">
                            <div class="col-5 fs-4 logOutImg text-end"><i class="bi bi-box-arrow-left" style="cursor: pointer;"></i></div>
                            <label class="col-7 fs-5   logOutTxt" style="cursor: pointer;" onclick="logOut();">Log Out</label>
                        </div>

                    </div>




                </div>

            </div>



            <!--  -->


            <div class="d-none d-lg-block d-md-block d-xl-block col-lg-3 col-md-3 col-xl-3  vh-100 fixed" style="background-color: #e46161;">

                <div class="row mt-4">

                    <div class="col-12 logo ">

                    </div>
                    <div class="col-11  mt-5 link actived" id="dashboard">
                        <div class="row ">
                            <div class="col-4  linkImg1 fs-1"><i class="bi bi-speedometer2"></i></div>
                            <label class="col-7 fs-5   linkTxt" style="cursor: pointer;" onclick="changeView2('d');">Dashboard</label>
                        </div>

                    </div>
                    <div class="col-11 link " id="users">
                        <div class="row ">
                            <div class="col-4  linkImg2 fs-1"><i class="bi bi-file-earmark-check"></i></div>
                            <label class="col-7 fs-5   linkTxt" style="cursor: pointer;" onclick="changeView2('mp');">Posts</label>
                        </div>
                    </div>
                    <div class="col-11  link " id="chat">
                        <div class="row ">
                            <div class="col-4  linkImg4 fs-1"><i class="bi bi-chat-dots"></i></div>
                            <label class="col-7 fs-5   linkTxt" style="cursor: pointer;" onclick="changeView2('c');">Chat</label>
                        </div>
                    </div>
                    <div class="col-11 logOut ">
                        <div class="row ">
                            <div class="col-5 fs-4 logOutImg text-end"><i class="bi bi-box-arrow-left" style="cursor: pointer;"></i></div>
                            <label class="col-7 fs-5   logOutTxt" style="cursor: pointer;" onclick="logOut();">Log Out</label>
                        </div>

                    </div>




                </div>

            </div>

            <div class="  col-lg-9 col-md-9 col-xl-9 col-sm-12 vh-100 offset-lg-3 offset-md-3 offset-xl-3 offset-sm-0" id="d">

                <div class="row">
                    <div class="fixed-start fs-1 d-lg-none d-md-none d-xl-none d-flex">
                        <i class="bi bi-list-ul" onclick="changeView();"></i>
                    </div>
                    <div class="col-12">
                        <h2 class="textDashboard">Admin Dashboard</h2>
                    </div>
                    <hr class=" col-10 offset-1">
                </div>
                <div class="row">
                    <div class="col-12 " style="margin-top: -5vh;">
                        <div class="row">
                            <div class="col-4 card">
                                <div class="row">
                                    <div class="col-7 crd1 text-center">
                                        <?php

                                        $query = "SELECT * FROM `user` WHERE `status`='1'";




                                        $user_rs = Database::search($query);
                                        $user_num = $user_rs->num_rows;
                                        ?>
                                        <h1 style="margin-top: 2vh;"><?php echo $user_num ?></h1>
                                        <h6 class="text-secondary">Users</h6>
                                    </div>
                                    <div class="col-5 crd2 text-secondary mb-5"><i class="bi bi-people "></i></div>
                                </div>

                            </div>
                            <div class="col-5 clockCrd">
                                <div class="row">
                                    <div class="clock">
                                        <div id="time" class="time"></div>
                                        <div id="date" class="date"></div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-4 card">
                                <div class="row">
                                    <div class="col-7 crd1 text-center">

                                        <?php

                                        $query = "SELECT * FROM `posts` WHERE `approvel`='1'";




                                        $posts_rs = Database::search($query);
                                        $posts_num = $posts_rs->num_rows;
                                        ?>
                                        <h1 style="margin-top: 2vh;"><?php echo $posts_num ?></h1>
                                        <h6 class="text-secondary">Posts</h6>
                                    </div>
                                    <div class="col-5 crd2 text-secondary mb-5"><i class="bi bi-postcard-heart"></i></div>
                                </div>

                            </div>
                            <div class="col-4 card">
                                <div class="row">
                                    <div class="col-7 crd1 text-center">

                                        <?php

                                        $query = "SELECT * FROM `admin`";




                                        $admin_rs = Database::search($query);
                                        $admin_num = $admin_rs->num_rows;
                                        ?>
                                        <h1 style="margin-top: 2vh;"><?php echo $admin_num ?></h1>
                                        <h6 class="text-secondary">Admins</h6>
                                    </div>
                                    <div class="col-5 crd2 text-secondary mb-5"><i class="bi bi-person-fill-gear"></i></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 class="textDashboard mt-3">Users</h3>
                    <div class="col-10 offset-1 users">
                        <div class="row">
                            <div class="col-12 th">
                                <div class="row">
                                    <div class="col-4 text-center">Name</div>
                                    <div class="col-6 text-start">Email</div>
                                    <div class="col-2 text-center">Status</div>
                                </div>

                            </div>
                        </div>

                        <?php

                        $query = "SELECT * FROM `user`";




                        $user_rs = Database::search($query);
                        $user_num = $user_rs->num_rows;



                        for ($x = 0; $x < $user_num; $x++) {
                            $data = $user_rs->fetch_assoc();




                        ?>

                            <div class="row">
                                <div class="col-12 tr mt-3">
                                    <div class="row">
                                        <div class="col-4 text-start"><?php echo $data["first_name"] . " " . $data["last_name"]; ?></div>
                                        <div class="col-6 text-start"><?php echo $data["email"]; ?></div>

                                        <?php
                                        if ($data["status"] == '1') {

                                        ?>
                                            <div class="col-2 text-center text-success fs-6"><i class="bi bi-toggle-on" onclick="changeStatus('<?php echo $data['email']; ?>');"></i></div>
                                        <?php

                                        } else { ?>

                                            <div class="col-2 text-center text-danger fs-6"><i class="bi bi-toggle-off" onclick="changeStatus('<?php echo $data['email']; ?>');"></i></div>
                                        <?php
                                        }

                                        ?>

                                    </div>

                                </div>
                            </div>

                        <?php

                        }

                        ?>


                    </div>
                </div>

            </div>
            <div class=" d-none  col-lg-9 col-md-9 col-xl-9 col-sm-12 vh-100 offset-lg-3 offset-md-3 offset-xl-3 offset-sm-0" id="mp">
                <div class="row">
                    <div class="fixed-start fs-1 d-lg-none d-md-none d-xl-none d-flex">
                        <i class="bi bi-list-ul" onclick="changeView();"></i>
                    </div>
                    <div class="col-12">
                        <h2 class="textDashboard">Manage Posts</h2>
                    </div>
                    <hr class=" col-10 offset-1">
                    <div class="row">
                        <h3 class="textDashboard mt-3">Users</h3>
                        <div class="col-10 offset-1 users">
                            <div class="row">
                                <div class="col-12 th">
                                    <div class="row">
                                        <div class="col-4 text-center">Publisher</div>
                                        <div class="col-2 text-start">View</div>
                                        <div class="col-4 text-center">Updated</div>
                                        <div class="col-2 text-center">Status</div>
                                    </div>

                                </div>
                            </div>

                            <?php

                            $query = "SELECT * FROM `posts`";




                            $posts_rs = Database::search($query);
                            $posts_num = $posts_rs->num_rows;



                            for ($x = 0; $x < $posts_num; $x++) {
                                $data = $posts_rs->fetch_assoc();

                                $query = "SELECT * FROM `user` WHERE `email`='" . $data["user_email"] . "'";




                                $user_rs = Database::search($query);
                                $user_data = $user_rs->fetch_assoc();




                            ?>

                                <div class="row">
                                    <div class="col-12 tr mt-3">
                                        <div class="row">
                                            <div class="col-4 text-start"><?php echo $user_data["first_name"] . " " . $user_data["last_name"]; ?></div>
                                            <div class="col-2 text-start"><a href="<?php echo $data["link"]; ?>"><i class="bi bi-eye text-primary"></i></a></div>



                                            <?php
                                            if ($data["updated_at"] == null) {

                                            ?>
                                                <div class="col-4 text-start"><?php echo $data["created_at"]; ?></div>
                                            <?php

                                            } else { ?>

                                                <div class="col-4 text-start"><?php echo $data["updated_at"]; ?></div>
                                            <?php
                                            }

                                          
                                            if ($data["approvel"] == '1') {

                                            ?>
                                                <div class="col-2 text-center text-success fs-6"><i class="bi bi-toggle-on" id="on" onclick="changeImgStatus('<?php echo $data['id']; ?>');"></i></div>
                                            <?php

                                            } else { ?>

                                                <div class="col-2 text-center text-danger fs-6"><i class="bi bi-toggle-off" id="off" onclick="changeImgStatus('<?php echo $data['id']; ?>');"></i></div>
                                            <?php
                                            }

                                            ?>

                                        </div>

                                    </div>
                                </div>

                            <?php

                            }

                            ?>


                        </div>
                    </div>

                </div>

            </div>
            <div class=" d-none col-lg-9 col-md-9 col-xl-9 col-sm-12 vh-100 offset-lg-3 offset-md-3 offset-xl-3 offset-sm-0" id="c">
                <div class="row">
                    <div class="fixed-start fs-1 d-lg-none d-md-none d-xl-none d-flex">
                        <i class="bi bi-list-ul" onclick="changeView();"></i>
                    </div>
                    <div class="col-12">
                        <h2 class="textDashboard">Chat</h2>
                    </div>
                    <hr class=" col-10 offset-1">
                    <div class="container">
                        <!--chat box-->
                        <div class="chat-box">
                            <!--client-->
                            <div class="client">
                                <img src="assets/images/804951.png" alt="logo" />
                                <div class="client-info">
                                    <h2>Thomas</h2>
                                    <p>online</p>
                                </div>
                            </div>

                            <!--Main chat section-->
                            <div class="chats">
                                <div class="client-chat">Hi!</div>
                                <div class="my-chat">Hi!</div>
                                <div class="client-chat">How can i help you?</div>
                                <div class="my-chat">🫠😁</div>
                            </div>

                            <!--input feild section-->
                            <div class="chat-input">
                                <input type="text" placeholder="Enter Message" />
                                <button class="send-btn">
                                    <img src="assets/images/black sent btn.png" alt="send-btn">
                                </button>
                            </div>
                        </div>

                        <!--button-->
                        <div class="chat-btn">
                            <img src="assets/images/779461.png" alt="chat icon btn">
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>




    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>