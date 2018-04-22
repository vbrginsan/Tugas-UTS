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
mysqli_query($conn, "TRUNCATE TABLE tbvektor");
//ambil setiap DocId dalam tbindex
	//hitung panjang vektor untuk setiap DocId tersebut
	//simpan ke dalam tabel tbvektor
	$resDocId = mysqli_query($conn, "SELECT DISTINCT DocId FROM tbindex");
	
	$num_rows = mysqli_num_rows($resDocId);
	print("<center>Terdapat " . $num_rows . " dokumen yang dihitung panjang vektornya. <br />");
	
	while($rowDocId = mysqli_fetch_array($resDocId)) {
		$docId = $rowDocId['DocId'];
	
		$resVektor = mysqli_query($conn, "SELECT Bobot FROM tbindex WHERE DocId = '$docId'");
		
		//jumlahkan semua bobot kuadrat 
		$panjangVektor = 0;		
		while($rowVektor = mysqli_fetch_array($resVektor)) {
			$panjangVektor = $panjangVektor + $rowVektor['Bobot']  *  $rowVektor['Bobot'];	
		}
		
		//hitung akarnya		
		$panjangVektor = sqrt($panjangVektor);
		
		//masukkan ke dalam tbvektor		
		$resInsertVektor = mysqli_query($conn, "INSERT INTO tbvektor (DocId, Panjang) VALUES ('$docId', $panjangVektor)");	
	} //end while $rowDocId

//Menampilkan isi dari tabel hitungvector
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
    $query = "SELECT * FROM tbvektor";

    require_once 'paginator.class.php';
    $paginator  = new Paginator($dbh, $query);
    $results    = $paginator->getData($limit, $page);
    $mulai = ($page>1) ? ($page * $limit) - $limit : 0;
    $no =$mulai+1;
?>
	<br>
	<h5 style="text-align:center">Hasil Hitung Vektor</h5>
	        <table class="table table-bordered">
	            <thead>
	                <tr>
	                    <th>No.</th>
	                    <th>Nama File</th>
	                    <th>Panjang Vektor</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
	                        <tr>
	                                <td><?php echo $no++; ?></td>
	                                <td><?php echo $results->data[$i]['DocId']; ?></td>
	                                <td><?php echo $results->data[$i]['Panjang']; ?></td>
	                                
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