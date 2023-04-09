<?php 

// INSERT INTO `notes` (`srno.`, `title`, `descripton`, `time stamp`) VALUES (NULL, 'books', 'hey deepu please boy some self devlopment books for me from the book shop near bus stand', current_timestamp());


    $insert = false ; 
    $update = false ; 
    $delete = false ; 

$servername = "localhost";
$username = "deepu";
$password = "";
$database = "notes";

$conn = mysqli_connect($servername , $username , $password , $database);

if (!$conn) {
    die("sorry we failed" . mysqli_connect_error());

    
}

if(isset($_GET['delete'])){
    $srno = $_GET['delete'] ;
    $delete = true ;
    

    $sql = "DELETE FROM `notes` WHERE `srno` = $srno ";
    $result = mysqli_query($conn, $sql);
    
  }
  

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])){
        // die("sorry we failed" . mysqli_connect_error());
        
        
        
         $srno = $_POST['snoEdit'];
         $title = $_POST['titleEdit'];
         $description = $_POST['descriptionEdit']; 
  
        
        $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`srno` = $srno" ;
        $result = mysqli_query($conn , $sql);
        if ($result) {
            // die("we updated the record successfully");
            $update = true ;
        }
        else{
            echo "we faild to updatwe the record" . mysqli_error($conn) ;
            
        }
        
        
        
    }
    else {

    
        $title = $_POST['title'];
        $description = $_POST['description']; 
  
       $sql = " INSERT INTO `notes` ( `title`, `description`) VALUES ( '".$title."', '".$description."')";
       $result = mysqli_query($conn , $sql);
    

       if ($result) {
    // echo "The table inserted successfully!<br>";
       $insert = true ;
   }
   else {
    echo "the table doesnot inserted successfully because of this error " . mysqli_error($conn) ;
   }
}

}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">





    <title>PHP CRUD project</title>

</head>

<body>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Launch demo modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Note Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
                        </div>
                    
                    </div>

                    <div class="modal-footer d-block mr-auto ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <?php 
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> You note has been added successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>" ;
    }
   ?>
    <?php 
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> You note has been Updated successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>" ;
    }
   ?>
    <?php 
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> You note has been deleted successfully.
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>" ;
    }
   ?>

    <div class="container my-3">
        <h2> Add note </h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Note title </label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter your note">
            </div>


            <div class="form-group">
                <label for="desc">Note description</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>

    </div>

    <div class="container   my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">srno</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
       $sql = " SELECT * FROM `notes` ";

   $result  = mysqli_query($conn , $sql);
  
     $srno =  0 ;
    while ($row = mysqli_fetch_assoc($result)) {
      $srno =  $srno + 1 ;
        echo "<tr>
        <th scope='row'>" . $srno ."</th>
        <td>".$row['title']."</td>
        <td>".$row['description']." </td>
        <td>   <button class='edit btn btn-sm btn-primary' id=".$row['srno']."> Edit </button> <button class='delete btn btn-sm btn-primary' id=d".$row['srno']."> Delete </button> </td>
    </tr> ";

    
    
    
     }
        ?>

            </tbody>
        </table>
    </div>
    <hr>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ", );
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, description);
                titleEdit.value = title;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id);
                $('#editModal').modal('toggle');




            })
        })




        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit");
                srno = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this note!")) {
                    console.log("yes");
                    window.location = `?delete=${srno}`;
                } else {
                    console.log("no");
                }




            })
        })
    </script>

</body>

</html>