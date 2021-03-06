<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HUMANIAN - Employee</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

    <link rel="stylesheet" href="../emoji-picker/lib/css/emoji.css">
</head>
<style>
    .textarea-field {
        resize: none;
        width: 430px;
        height: 40px;
        max-height: 45px;
        padding: 8px 0 0 18px;
        font-size: 14px;
        margin-top: 10px; 
        margin-left: 10px; 
        border-radius: 20px; 
        outline: none;
    }
</style>
<body id="top">
    <?php 

    include("../navigation-employee.php");


    ?>


    <div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10">
            <div class="container" id="dashboard-container">
                <div class="row">
                    <div class="col-md-8 lg-8 sm-8">
                        <div class="panel" id="dashboard-card" style="height:100px">
                          <div class="row">
                                <div class="col-md-2 lg-2 sm-2">
                                <img src="../img/<?php echo $pic;?>" id="feeds-user-image" style="height:60px;margin-top: 19px;margin-left: 20px;border-radius: 72px;border: 1px solid #ccc;"/>  
                                </div>
                                <div class="col-md-9 lg-9 sm-9">
                                  <textarea class="textarea-field" name="content" placeholder="Post your feelings!" style="margin-top: 10px;" data-emojiable="true" data-emoji-input="unicode"></textarea>
                                  <button type="button" name="" style="margin-left: 30px; margin-top: 5px; border: none; background: none;"><img src="../img/happy.png" alt=""></button>
                                  <input type="submit" value="Post Now" class="btn btn-primary" style="position: absolute; top: 57px; left: 350px">    
                                </div>
                          </div>                          
                        </div>

                        <?php

                          include('../connect.php');

                          $feeds = $connect->query("SELECT * FROM tblfeeds WHERE teamId = '$team' ORDER BY feedId DESC");

                          while($row = $feeds->fetch_array()){

                              echo '<div class="panel" id="dashboard-card" style="height:100%">';
                              echo '<div class="row">';
                              

                              $user = $connect->query("SELECT * FROM tblemployees WHERE userId = '" . $row['userId']. "'");

                              while($data = $user->fetch_assoc()){
                                echo '<div class="col-md-2 lg-2 sm-2">';
                                echo '<img src="../img/'. $data['employeePicture'].'" id="feeds-user-image" style="height:60px;margin-top: 19px;margin-left: 20px;border-radius: 72px;border: 1px solid #ccc;"/>';  
                                echo '</div>';
                                echo '<div class="9-md-9 lg-9 sm-9">';
                                echo '<h5 class="text-left" style="font-weight: bold;margin-bottom: 2px;margin-top: 32px;">'. $data['employeeFirstname'].' ' . $data["employeeMiddlename"]. ' ' . $data['employeeSurname']. '</h5>';
                                echo '<p class="text-left">A day ago</p>';
                                echo '</div>';  
                              }
                              echo '</div>';
                              
                              echo '<h5 class="text-left" style="margin-left:20px;margin-bottom:30px;margin-top:25px;">'. $row["feedContent"]. '</h5>';

                              if($row['feedImage'] !== ''){
                                echo '<img src="../img/' . $row["feedImage"]. '" id="feeds-image" style="width: 100%;border: 1px solid #ccc;"/>';
                              }
                              else{ 
                              
                              }
                              
                              
                              
                              echo '</div>';
                          
                          }



                        ?>                        
                    </div>
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" id="dashboard-card">
                            <h5 class="text-left" id="card-header">TIME-IN / TIME-OUT:</h5><hr/>
                            <div class="card-body">
                                <h2 style="font-weight: bolder; margin-left: 10px; margin-top: 47px;">08:44 AM</p>
                                <p style="font-size: 100px; font-weight: 100; position: absolute; top: 50px; left: 155px; color: #1D8E86">|</p>

                                <div style="position: absolute; top: 0; left: 150px; top: 75px;">
                                  <h2 style="font-weight: bold; margin-left: 30px;">08:44 AM</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 lg-4 sm-4">
                            <div class="panel" id="dashboard-card" style="height:100px">
                                <h4 class="text-center">VL:</h4>
                                <h3 class="text-center">4</h3>
                            </div>
                          </div>
                          <div class="col-md-4 lg-4 sm-4">
                            <div class="panel" id="dashboard-card" style="height:100px">
                                <h4 class="text-center">SL:</h4>
                                <h3 class="text-center">3</h3>
                            </div>
                          </div>
                          <div class="col-md-4 lg-4 sm-4">
                            <div class="panel" id="dashboard-card" style="height:100px">
                                <h4 class="text-center">EL:</h4>
                                <h3 class="text-center">2</h3>
                            </div>
                          </div>
                        </div>
                        <div class="panel" id="dashboard-card">
                            <h5 class="text-left" id="card-header">YOU ARE HERE:</h5><hr/>
                        </div>
                        
                    </div>
                  </div> 
                

        </div>

    <script src ="../js/jquery.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

    <script src="../js/config.js"></script>
    <script src="../js/util.js"></script>
    <script src="../js/jquery.emojiarea.js"></script>
    <script src="../js/emoji-picker.js"></script>

    <script>
        $(function () {
          // Initializes and creates emoji set from sprite sheet
          window.emojiPicker = new EmojiPicker({
              emojiable_selector: '[data-emojiable=true]',
              assetsPath: 'Humanian/emoji-picker/lib/img/',
              popupButtonClasses: 'icon-smile'
          });

          window.emojiPicker.discover();
      });
    </script>
</body>
</html>