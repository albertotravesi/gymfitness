<?php 
    function gymfitness_lista_clases(){
?>
        <ul class="lista-clases">
            <!-- Consulta de bases de datos con WP_Query -->
            <?php  
                $args = array(
                    // gymfitness_clases es el register_post_type del plugin que creamos
                    'post_type' => 'gymfitness_clases',
                    //cuantos post por página se va a traer
                    'posts_per_page' => 10
                    // 'order' => 'DESC',
                    // 'orderby' => 'title'
                );

                // The Query
                $clases = new WP_Query( $args );

                // The Loop
                if ( $clases->have_posts() ) {
                    
                    while ( $clases->have_posts() ):
                        $clases->the_post();
            ?>
                    <li class="clase card gradient">
                        <?php the_post_thumbnail('mediano'); ?>            
                        
                        <div class="contenido">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>

                            <?php 
                                $hora_inicio = get_field('hora_inicio');
                                $hora_fin = get_field('hora_fin');
                                ?>

                            <p><?php the_field('dias_clase') ?> - <?php echo $hora_inicio . " a " . $hora_fin; ?></p>
                        </div>
                    </li>
            <?php
                        
                    endwhile; 
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            ?>
        </ul>
<?php  
    }
?>