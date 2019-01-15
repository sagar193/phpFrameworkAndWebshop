
        <div class="container_12">


<h1>cart</h1>

        <div class="products_list catalog">    

    <?php
                    if(isset($_COOKIE["CART"]))
                {
		                foreach($this->products as $product)
						{
								echo '
							  	<article>
								<div class="grid_3">
					  			<div class="prev">
									<a href="product_page.php?productid=' .$product->ProductID. '"><img src="' . $product->ProductImageLink . '" alt="Product 2" title=""></a>
					   			</div><!-- .prev -->
								</div><!-- .grid_3 -->
						
								<div class="grid_6">
					 			 <div class="entry_content">
									<h3 class="title">' . $product->ProductName . '</h3>
		               				 <p>'. $product->ProductDescription.'</p>
		                  		</div><!-- .entry_content -->
		                            
		                   	 	<div class="price">
		                    	€ ' . $product->ProductPrice . ',
                                </div>
                                
                                <label>Amount: </label>
                                <label>'.$product->Amount.'</label>
                                <a href="'. ROOTURL .'/cart/remove/'.$product->ProductID.'">
                                <img src="'. ROOTURL.'/public/images/edit.png"/></a>
                                <a href="'. ROOTURL.'/cart/delete/'.$product->ProductID.'">
                                <img src="'. ROOTURL.'/public/images/delete.png"/></a>
								</div><!-- .grid_6 -->
								<div class="clear"></div>
								</form>
				    			</article>';
						}
					}
          
          	?>
    </div>


<?php 
if(isset($this->CartTotalPrice)) {
    echo "<br/>";
    echo "<label> Totale prijs: ". $this->CartTotalPrice ."</label>";
}?>
<br/>
<a href="<?php ROOTURL?>/order/add"> 
<button type="button">order</button> </a>
                <div class="clear"></div>

        </div>

