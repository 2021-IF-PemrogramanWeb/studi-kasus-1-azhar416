<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- ICON -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style-login.css">

    <title>TABEL</title>
</head>

<body>
    <div class="card">
        <div class="card-header" style="margin-left: auto; margin-right: auto">
            <h2 class="card-title">TABEL PEGAWAI</h2>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>BoD</th>
                        <th>Hire Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                      $connect = mysqli_connect("localhost", "root", "", "employees");
                      $fill = mysqli_query($connect, "select first_name as 'First Name', last_name, gender, birth_date, hire_date from employees where emp_no >= 9998 LIMIT 10");
                      while($f = mysqli_fetch_array($fill)){
                          ?>
                          <tr>
                              <td><?php echo $f['First Name']; ?></td>
                              <td><?php echo $f['last_name']; ?></td>
                              <td><?php echo $f['gender']; ?></td>
                              <td><?php echo $f['birth_date']; ?></td>
                              <td><?php echo $f['hire_date']; ?></td>
                          </tr>
                        <?php
                      }
                      ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>