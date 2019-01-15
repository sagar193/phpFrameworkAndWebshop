<div class="container_12">
<h1>product page</h1>

        <div class="products_list catalog">    

    <?php
                    if($this->products != false)
                {
		                foreach($this->products as $product)
						{
								echo '
							  	<article>
								<div class="grid_3">
					  			<div class="prev">
									<a href="product_page.php?productid=' .$product->ProductID. '"><img src="'.ROOTURL.'public/images/Products/' . $product->ProductImageLink . '" alt="Product 2" title=""></a>
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
                                
                                <form action="'. ROOTURL."/cart/add/".$product->ProductID . '">
                                <input type="submit" value="Add to cart" class="add_to_cart">
                                </form>
								</div><!-- .grid_6 -->
								<div class="clear"></div>
								</form>
				    			</article>';
						}
					}
          
          	?>
    </div>
</div>