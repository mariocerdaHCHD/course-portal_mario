<!DOCTYPE html>
    <?php 
    include "back.php";
    //translate special characters to be visible for user
    header('Content-Type: text/html; charset=ISO-8859-1'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Course Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeWin()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- course description -->
                    <?php echo $cd;?>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closeWin()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
    <script src="../../../assets/js/course.js"></script>
</body>
</html>