<?php
	
include 'header.php';

	//300 seconds = 5 minutes
  ini_set('max_execution_time', 60);
	// Turn off all error reporting 
  error_reporting(0);

$host='localhost';
$user='root';
$pass='';
$database='dbstbi';

$conn=mysqli_connect($host,$user,$pass);
mysqli_select_db($conn, $database);
//hitung index
mysqli_query($conn, "TRUNCATE TABLE tbindex");
$resn = mysqli_query($conn, "INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token");
	$n = mysqli_num_rows($resn);
	

//berapa jumlah DocId total?, n
	$resn = mysqli_query($conn, "SELECT DISTINCT DocId FROM tbindex");
	$n = mysqli_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysqli_query($conn, "SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysqli_num_rows($resBobot);
	print("<center>Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysqli_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysqli_query($conn, "SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysqli_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		$resUpdateBobot = mysqli_query($conn, "UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot

  	//Menampilkan isi dari tabel hitungbobot
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
    $query = "SELECT * FROM tbindex ORDER BY Count DESC";

    require_once 'paginator.class.php';
    $paginator  = new Paginator($dbh, $query);
    $results    = $paginator->getData($limit, $page);
    $mulai = ($page>1) ? ($page * $limit) - $limit : 0;
    $no =$mulai+1;
?>
	<br>
	<h5 style="text-align:center">Hasil Hitung Bobot</h5>
	        <table class="table table-bordered">
	            <thead>
	                <tr>
	                    <th>No.</th>
	                    <th>Nama File</th>
	                    <th>Tanggal Upload</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
	                        <tr>
	                                <td><?php echo $no++; ?></td>
	                                <td><?php echo $results->data[$i]['Term']; ?></td>
	                                <td><?php echo $results->data[$i]['Bobot']; ?></td>
	                                
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