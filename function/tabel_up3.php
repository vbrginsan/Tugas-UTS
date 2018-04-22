<?php
    include 'header.php';

    $user = "root";
    $pass = "";
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=dbstbi', $user, $pass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    $limit = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 20;
    $page  = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    $links = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
    $query = "SELECT * FROM tb_katadasar";

    require_once 'paginator.class.php';
    $paginator  = new Paginator($dbh, $query);
    $results    = $paginator->getData($limit, $page);
    $mulai = ($page>1) ? ($page * $limit) - $limit : 0;
    $no =$mulai+1;
?>

    
        <h3 style="text-align:center">Data Kata Dasar</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kata Dasar</th>
                    <th>Tipe Kata Dasar</th>
                </tr>
            </thead>
            <tbody>
                <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
                        <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $results->data[$i]['katadasar']; ?></td>
                                <td><?php echo $results->data[$i]['tipe_katadasar']; ?></td>
                                
                        </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <center>
        <?php echo $paginator->createLinks($links); ?> 
        </center>

<?php 
    include 'footer.php';
 ?>