<!-- Breadcrumbs-->
<ol class="breadcrumb">
<?php foreach ($this->uri->segments as $segment): ?>
	<?php 
		$url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
		$is_active =  $url == $this->uri->uri_string;
	?>


	<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
		<?php if($is_active): ?>
			<?php if($segment == "absen"){
				$segment = "attendance";
			}elseif($segment == "karyawan"){
				$segment = "employee";
			}elseif($segment == "cuti"){
				$segment = "paid leave";
			}elseif($segment == "tunjangan"){
				$segment = "allowance";
			}elseif($segment == "jabatan"){
				$segment = "position";
			}elseif($segment == "ilowongan"){
				$segment = "job vacancy";
			}elseif($segment == "rekap"){
				$segment = "Recap Attendance";
			}elseif($segment == "ijin"){
				$segment = "unpaid leave";
			}elseif($segment == "rekapcuti"){
				$segment = "Recap Paid Leave";
			}elseif($segment == "rekapijin"){
				$segment = "Recap Unpaid Leave";
			}elseif($segment == "tjabatan"){
				$segment = "Positional Allowance";
			}?>
			<?php echo ucfirst($segment) ?>
		<?php else: ?>
			<?php if($segment == "absen"){
				$segment = "attendance";
			}elseif($segment == "karyawan"){
				$segment = "employee";
			}elseif($segment == "cuti"){
				$segment = "paid leave";
			}elseif($segment == "ijin"){
				$segment = "unpaid leave";
			}?>
			<a href="<?php echo site_url($url) ?>" style="text-decoration:none;"><?php echo ucfirst($segment)  ?></a>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ol>
