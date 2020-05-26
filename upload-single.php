<?PHP

if(isset($_POST['submit'])){
        $name       = $_FILES['file-upload']['name'];  
        $temp_name  = $_FILES['file-upload']['tmp_name'];
        if(isset($name) and !empty($name)){
            $location = '/app/public/dashboard/uploads/';      
            if(move_uploaded_file($temp_name, $location.$name)){
                
                header('location: convert.php');
            }
        } else {
            echo 'You should select a file to upload !!';
        }
    }

        

    ?>