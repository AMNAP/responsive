<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'data.php';
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.btn').click(function(){
                    var id = $(this).attr('id'); 
                        $.ajax({
                            url: 'data.php?id='+id,
                            success: function(data){
                            $('#uitkomst').html(data);   
                            }
                        });                   
                    $('.popup').css('display', 'block');      
                });
            });
            
            $(document).ready(function(){
                $('.popup').click(function(){
                    $('.popup').css('display', 'none');   
                });
            });      
        </script> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="OpdrachtCSS.css" rel="stylesheet" type="text/css"/>
        <title>users</title>
    </head>
    <body> 
         <div class="popup">
             <div class="inhoud" id="uitkomst">
             </div>
        </div>     
        <div class="test">
            <?php
            showusers();
            ?> 
        </div>  
        <div class="footer">
            Gemaakt door Anne-Marije Nap
        </div>
    </body>
</html>
