<?php

// made search function here in non NON OOP way because of controller instantiation from Url 
// (would be a conflict with the order by and search url)

if(isset($_POST['search' ])){
    $valueToSearch = $_POST['valueToSearch' ];
        
        $query =("SELECT * FROM `emails` WHERE CONCAT( `email`) LIKE '%".$valueToSearch."%'");
        $search_result = filterTable($query); 
}
else if(isset($_POST['filter' ])){
    $valueToSearch = $_POST['filter' ];
        
        $query =("SELECT * FROM `emails` WHERE CONCAT( `email`) LIKE '%".$valueToSearch."%'");
        $search_result = filterTable($query); 
}
else {
    $query = "SELECT * FROM `emails`";
    $search_result = filterTable($query);
}

function filterTable($query){
    $connect = mysqli_connect("localhost", "root", "", "mbit_email_list");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
};

// export function /exports filtered emails/
if(isset($_POST["export"]))  
{  
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=emails.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('Emails'));

        $query = "SELECT email FROM `emails`";
        $search_result = filterTable($query);

    while($row = mysqli_fetch_row($search_result))  
    {  
        fputcsv($output, $row);  
    }  
    fclose($output);  
    die;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>
<div class="tables">   
</table>
<table> 
       
</table>
<table>  
    <tr>     <!-- table top(used fonts for arrows) -->
        <th width="30%"> <a href="<?php echo URLROOT . "/posts/EmailASC"?>">&#8679;</a> 
        <a href="<?php echo URLROOT . "/posts/EmailDEC/"?>">&#8681;</a> Email</th>  
        <th width="30"> <a href="<?php echo URLROOT . "/posts/index"?>">&#8679;</a> 
        <a href="<?php echo URLROOT . "/posts/DateDEC"?>">&#8681;</a> Submitted at</th>  
    
        <th width="10%">Delete</th>  
    </tr>                        <!--table part where can see by asc or desc values  -->
    <?php foreach($data['posts']  as $email ): ?> 
        <form action="<?php echo URLROOT . "/posts/delete/" . $email->id ?>" method="POST">
            <tr>  
                <td><?php echo $email->email; ?></td>  
                <td><?php echo $email->created_at; ?></td>  
                
                <td><input  type="submit"   name="delete" value="Delete" ></td>  
            </tr>  
        </form>
    <?php endforeach; ?>
</table>  
        
<table>   <!--  new table for search results and "filtered by email"-->
    <form action="index.php"  method="post">
        <div class="search">
            <input type="text" name="valueToSearch" placeholder="Value To Search &#8680;" ><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
               
        </div>  

            

            <tr>
                <th>Email</th>
                <th>Submitted at</th>
                <th>Delete</th>
            </tr>
        <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
            
                <td> <?php echo $row['email'];?></td>
                <td><?php echo $row['created_at'];?></td>

                <form action="<?php echo URLROOT . "/posts/delete/" . $email->id ?>" method="POST">
                <td><input  type="submit"   name="delete" value="Delete" ></td>  

                </form>

            </tr>
        <?php endwhile;?>
    
    </form>
</table>

<table class="table table-bordered">   
     <?php
    foreach($data['posts']  as $email ):
        $emaili = "echo $email->email"; 
        $parts = explode("@",$emaili ); 
        $domains = $parts [1];
    ?>

    <?php 
    //was trying to filter domains for unique(to avoid duplicate) domains code bellow -
    // did not filter info returns same values as $domains,
    // but i think this function is right one...
   
    // $strings =  $domains . ", " ;

    //  $string_aray = explode (", ", $strings); 
     
    //  $final_aray = array_unique($string_aray);
     
    //  $final_string = implode("<br>", $final_aray );
     ?>

    <form action="index.php" method="post">
        <tr>
            <td> 
                <button name="filter" type="text" value="<?php echo $domains;?>" > <?php echo $domains;?> </button>
            </td>
        </tr>
      
    </form>                     
    <?php endforeach; ?>

<table>
    <form method="post" action="export.php" >
                 <td> <input type="submit" name="export" value=" EXPORT FILTERED EMAILS AS CSV" class="btn btn-success"/> </td> 
                 
    </form>  
   
</table>
</div>

</html >