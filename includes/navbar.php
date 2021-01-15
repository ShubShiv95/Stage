    <?php //session_start();  
    ?>
    <div class="navbar navbar-expand-md header-menu-one bg-light d-print-none">
        <div class="nav-bar-header-one">
            <div class="header-logo">
                <a href="index.html">
                    <img src="img/swipetouch_allblue_logo7.png" alt="logo">
                </a>
            </div>
            <div class="toggle-button sidebar-toggle">
                <button type="button" class="item-link">
                    <span class="btn-icon-wrap">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="d-md-none mobile-nav-bar">
            <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar" aria-expanded="false">
                <i class="far fa-arrow-alt-circle-down"></i>
            </button>
            <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
            <ul class="navbar-nav left">
                <li class="navbar-item header-search-bar">
                    <div class="admin-img">
                        <img src="app_images/school_images/logo.jpeg" alt="Logo">
                    </div>
                    <!--div class="input-group stylish-input-group">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="flaticon-search" aria-hidden="true"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Find Something . . .">
                        </div-->
                </li>
            </ul>
            <ul class="navbar-nav right">
                <li class="navbar-item dropdown header-admin">
                    <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <div class="admin-title">
                            <h5 class="item-title"><?php echo $_SESSION["NAME"]; ?></h5>
                            <span></span>
                        </div>
                        <div class="admin-img">
                            <img src="app_images/profile/<?php echo $_SESSION["LOGINID"]; ?>.jpg" alt="<?php echo $_SESSION["NAME"]; ?>" width="40" height="40">
                        </div>
                        <?php
                        /*
                            if($_SESSION["LOGINTYPE"]=="PARENT")
                            {
                            echo '<div class="admin-img">Sibling';
                            
                            foreach($_SESSION["SIBLINGLIST"]["NAME"] as $name,$_SESSION["SIBLINGLIST"]["STUDENTID"] as $studentid)
                                    {
                                        echo '<a class="dropdown-item" href="#">' . $_SESSION["SIBLINGLIST"]["NAME"] . '</a>';
                                        
                                    }  
                                    
                            echo '</div>';
                                }
                                */
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="item-header">
                            <h6 class="item-title"><?php echo $_SESSION["NAME"]; ?></h6>
                        </div>
                        <div class="item-content">
                            <ul class="settings-list">
                                <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li>
                                <li><a href="#"><i class="flaticon-list"></i>Task</a></li>
                                <li><a href="#"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a></li>
                                <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                                <li><a href="#" id="change_pwd"><i class="fa fa-key" aria-hidden="true"></i>Change Password</a></li>
                                <li><a href="signout.php"><i class="flaticon-turn-off"></i>Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <!--Theme Change Drop Down System -->
                <li class="navbar-item dropdown header-notification">
                    <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <!--i class="far fa-bell"></i-->
                        <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                        <img src="img/theme-change-icon.png" width="40" height="40">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="item-header">
                            <h6 class="item-title">Select Your Theme</h6>
                        </div>
                        <div class="item-content">
                            <div class="media">
                                <div class="item-icon bg-skyblue">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="media-body space-sm">
                                    <div class="post-title">Clasical</div>

                                </div>
                            </div>
                            <div class="media">
                                <div class="item-icon bg-orange">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="media-body space-sm">
                                    <div class="post-title">Education</div>

                                </div>
                            </div>
                            <div class="media">
                                <div class="item-icon bg-violet-blue">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <div class="media-body space-sm">
                                    <div class="post-title">Super Storm</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!--End of Theme change system -->


                <li class="navbar-item dropdown header-message">
                    <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-envelope"></i>
                        <div class="item-title d-md-none text-16 mg-l-10">Message</div>
                        <span>5</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="item-header">
                            <h6 class="item-title">05 Message</h6>
                        </div>
                        <div class="item-content">
                            <div class="media">
                                <div class="item-img bg-skyblue author-online">
                                    <!---img src="app_imges/profile/19.jpg" alt="img"-->
                                </div>
                                <div class="media-body space-sm">
                                    <div class="item-title">
                                        <a href="#">
                                            <span class="item-name">Maria Zaman</span>
                                            <span class="item-time">18:30</span>
                                        </a>
                                    </div>
                                    <p>What is the reason of buy this item.
                                        Is it usefull for me.....</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="item-img bg-yellow author-online">
                                    <img src="img/figure/student12.png" alt="img">
                                </div>
                                <div class="media-body space-sm">
                                    <div class="item-title">
                                        <a href="#">
                                            <span class="item-name">Benny Roy</span>
                                            <span class="item-time">10:35</span>
                                        </a>
                                    </div>
                                    <p>What is the reason of buy this item.
                                        Is it usefull for me.....</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="item-img bg-pink">
                                    <img src="img/figure/student13.png" alt="img">
                                </div>
                                <div class="media-body space-sm">
                                    <div class="item-title">
                                        <a href="#">
                                            <span class="item-name">Steven</span>
                                            <span class="item-time">02:35</span>
                                        </a>
                                    </div>
                                    <p>What is the reason of buy this item.
                                        Is it usefull for me.....</p>
                                </div>
                            </div>
                            <div class="media">
                                <div class="item-img bg-violet-blue">
                                    <img src="img/figure/student11.png" alt="img">
                                </div>
                                <div class="media-body space-sm">
                                    <div class="item-title">
                                        <a href="#">
                                            <span class="item-name">Joshep Joe</span>
                                            <span class="item-time">12:35</span>
                                        </a>
                                    </div>
                                    <p>What is the reason of buy this item.
                                        Is it usefull for me.....</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="navbar-item dropdown header-notification">
                    <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <div class="item-title d-md-none text-16 mg-l-10">Notification</div>
                        <span>8</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="item-header">
                            <h6 class="item-title">03 Notifiacations</h6>
                        </div>
                        <div class="item-content">
                            <div class="media">
                                <div class="item-icon bg-skyblue">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="media-body space-sm">
                                    <div class="post-title">Complete Today Task</div>
                                    <span>1 Mins ago</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="item-icon bg-orange">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="media-body space-sm">
                                    <div class="post-title">Director Metting</div>
                                    <span>20 Mins ago</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="item-icon bg-violet-blue">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <div class="media-body space-sm">
                                    <div class="post-title">Update Password</div>
                                    <span>45 Mins ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>



                <li class="navbar-item dropdown header-language">
                    <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>Session 2020-2021</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php


                        foreach ($_SESSION["SESSIONLIST"] as $value) {
                            echo '<a class="dropdown-item" href="Reset_Session.php?sessionid=' . $value .  '">' . $value . '</a>';
                        }
                        ?>
                        <!--a class="dropdown-item" href="#">2021-2022</a>
                            <a class="dropdown-item" href="#">2020-2021</a>
                            <a class="dropdown-item" href="#">2019-2020</a>
                            <a class="dropdown-item" href="#">2018-2019</a-->
                    </div>
                </li>
            </ul>
        </div>
    </div>

<!-- change password modal -->
    <div class="modal change_pwd_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Change Password</h6>
                <button type="button" class="close close_pwd_modal" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="model-tebal-in">
                    <div class="col-xl-12 col-lg-12 col-12 aj-mb-2">
                        <form class="new-added-form aj-new-added-form Fee-collection" action="./change_password_1.php" method="POST" id="change_password_form">
                            <div class="Attendance-staff  aj-scroll-Attendance-staff">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12 aj-mb-2 mt-3 ml-1 row">
                                    <div class="form-group aj-form-group col-xl-12 col-lg-12 col-12">
                                        <label>Current Password</label>
                                        <input type="text" class="d-none" name="password_sender">
                                        <input type="password" id="current_password" name="current_password" placeholder="" autocomplete="off" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group col-xl-12 col-lg-12 col-12">
                                        <label>New Password</label>
                                        <input type="password" id="new_password" name="new_password" placeholder="" autocomplete="off" required="" class="form-control">
                                    </div>
                                    <div class="form-group aj-form-group col-xl-12 col-lg-12 col-12">
                                        <label>Re-Type Password</label>
                                        <input type="password" id="re_password" name="re_password" placeholder="" autocomplete="off" required="" class="form-control">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-1 aj-mb-2">
                                        <button type="submit" name="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark float-right" id="search_data">Change Password</button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 mt-2 table-responsive populate_student_list form_output">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
    $(document).on('click', '#change_pwd', function(event) {
        event.preventDefault();
        $('.change_pwd_modal').fadeIn('slow');
    });
    $(document).on('click','.close_pwd_modal',function(event){
        event.preventDefault();
        $('.change_pwd_modal').fadeOut('slow');
    });
    $(document).on('submit','#change_password_form',function(event){
        event.preventDefault();
        current_pwd = $('#current_password').val();
        $('.form_output').html('');
        var form_data = $(this).serialize();
        if(current_pwd!=''){
            $.post($(this).attr('action'),form_data,function(reset_resp){
                $('.form_output').html(reset_resp);
            });
        }
    });
    $(document).on('blur','#re_password',function(){
        var new_pwd = $('#new_password').val();
        var re_pwd = $(this).val();
        if(re_pwd != new_pwd){
            alert("Password Not Matched With New Password");
            $(this).val('');
        }
    });

</script>