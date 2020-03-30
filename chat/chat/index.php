<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: ..");
    }
    $username = $_SESSION['username'];
    include("../includes.php");
    ?>
    <link rel="stylesheet" href="custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>

<body>

    <div class="container-fluid">
        <div class="col-sm-3 bg-primary rb text-center">
            <h3><?php echo "$username"; ?></h3>
        </div>
        <div class="container-fluid border" id="chat_space" style="height:500px; overflow: auto;">
            <div style="text-right" style="overflow: hidden;" id="abc">

            </div>
        </div>
        <div>
            <script>
                $(document).ready(function() {
                    loaddata();
                });

                function loaddata() {
                    $("#abc").load("fetch.php");
                    document.getElementById('chat_space').scrollTop();
                    setTimeout(loaddata, 200);
                }
            </script>
            <script>
                    $(document).ready(function() {
                        $('#msg').submit(function() {

                            $.ajax({
                                    type: 'POST',
                                    url: 'post.php',
                                    data: $(this).serialize()
                                })
                                .done(function(data) {

                                    // show the response
                                    $('#result').html('sent');
                                    document.getElementById("message").value = null;

                                })
                                .fail(function() {

                                    // just in case posting your form failed
                                    alert("Posting failed.");

                                });

                            // to prevent refreshing the whole page page
                            return false;

                        });
                    });
            </script>
            </script>
            <form id="msg">
                <div class="border" style="padding:4px;margin-top:3px;">
                    <input type="text" value="" id="message" placeholder="Enter Your Message..." name="message" class="form-control text-center" style="margin-top:5px; font-size:20px;">
                    <input type="submit" value="Send" name="send" class="btn-primary form-control" style="margin-top:5px;">
                </div>
            </form>
            <!-- <form method="POST" id="msg-form">
                <div class="form-group text-center">
                    <input type="text" class="form-control float-left" style="width:auto" placeholder="Enter You Message Here........" id="message" name="message">
                    <input type="submit" value="Send" id="submit" name="submit" class="btn btn-success btn-lg float-right">
                </div>
            </form> -->
        </div>
    </div>
    <script>
        document.getElementById("message").focus();
    </script>
</body>

</html>