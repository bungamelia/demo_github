<?php
/**
* File 		: class.DB.php
* Author 	: Angga 
* Email 	: <anggagewor@gmail.com> <angga.purnama@mcs.co.id>
* License 	: GPLV2
*/
class crud{
    private $db;
  

    public function __construct($DB_con){
       $this->db=$DB_con;
   }
   
	public function tambahBuku($judul, $penerbit_buku, $tahun){		
		try{
			$stmt = $this->db->prepare("INSERT INTO buku(judul, penerbit_buku, tahun) VALUES(:judul, :penerbit_buku, :tahun)");
			$stmt->bindparam(":judul",$judul);
			$stmt->bindparam(":penerbit_buku",$penerbit_buku);
			$stmt->bindparam(":tahun",$tahun);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
			return false;
		}
	}
	
	public function tampilBuku($query){
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($stmt->rowCount()>0){
			while($row=$stmt->fetch(PDO::FETCH_OBJ)){ ?>
                <tr>
					<td><?php print($row->id_buku); ?></td>
					<td><?php print($row->judul); ?></td>
					<td><?php print($row->penerbit_buku); ?></td>
					<td><?php print($row->tahun); ?></td>
					<td><a href='tampil.php?delete=<?php echo $row->id_buku; ?>'>Hapus</a> || <a href='edit.php?edit=<?php echo $row->id_buku; ?>'>Edit</a></td>
					<?php
			}
		}
		else{ ?>
			<tr>
				<td>Nothing here...</td>
			</tr><?php
		}
	}
	
	public function hapusBuku($id_buku){
		$stmt = $this->db->prepare("DELETE FROM buku WHERE id_buku=:id_buku");
		$stmt->bindparam(":id_buku",$id_buku);
		$stmt->execute();
		return true;
	}
	
	public function getID($id_buku){
		$stmt = $this->db->prepare("SELECT * FROM buku WHERE id_buku=:id_buku");
		$stmt->execute(array(":id_buku"=>$id_buku));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function updateBuku($id_buku, $judul, $penerbit_buku, $tahun){		
		try{
			$stmt = $this->db->prepare("UPDATE buku SET judul=:judul, penerbit_buku=:penerbit_buku, tahun=:tahun WHERE id_buku=:id_buku");
			$stmt->bindparam(":judul",$judul);
			$stmt->bindparam(":penerbit_buku",$penerbit_buku);
			$stmt->bindparam(":tahun",$tahun);
			$stmt->bindparam(":id_buku",$id_buku);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
			return false;
		}
	}
}
 ?>