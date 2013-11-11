<style>
.halaman
 {
 margin:10px;
 font-size:12px; text-align:right;
 }

.halaman a
 {

padding:3px;
 background:#0000ff;
 border:1px solid #FFA500;
 font-size:12px;
 font-weight:bold;
 color:#FFF;
 text-decoration:none;

}
 </style>
 			<h1><?=$title;?></h1>

			<!-- Table (TABLE) -->
			<br /><br />
            <div class="halaman">Halaman  <?php echo $page; ?></div>
			<table width="100%">
				<tr>
					<th>No</th>					    
				    <th width="400">Product Name</th>
				    <th width="200">Quantity Per Unit</th>	
                    <th>Units In Stock</th>	
                    <th>Units On Order</th>	
                    <th>Reorder Level</th>				   				   
				</tr>
				<?php
					foreach($nur_tampil as $rahayu):		
					$no++;	
					$css=($no%2==1)? '' : 'class="bg"';
				?>
				<tr <?=$css;?> >
					<td><?=$no;?>.</td>				    
				    <td><?=$rahayu->ProductName;?></td>
				    <td><?=$rahayu->QuantityPerUnit;?></td>
                    <td align="center"><?=$rahayu->UnitsInStock;?></td>
                    <td align="center"><?=$rahayu->UnitsOnOrder;?></td>
                    <td align="center"><?=$rahayu->ReorderLevel;?></td>
                    
                    				    
				</tr>
				<?php  endforeach; ?>
			</table>
             <div class="halaman">Halaman  <?php echo $page; ?></div>
