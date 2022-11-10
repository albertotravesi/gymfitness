<?php 
/* 
* Template Name: Template para Galerías
*/


get_header(); ?>

<main class="contenedor pagina seccion">
    <div class="contenido-principal">
        
        <?php while(have_posts()): the_post(); ?>
            <h1 class="text-center texto-primario"><?php the_title(); ?></h1>

            <?php  
                //Obtener la galería de la página actual
                $galeria = get_post_gallery(get_the_ID(), false);
                //Obtener los IDs de cada imágen
                $galeria_imagenes_ID = explode(',', $galeria['ids']);               
            ?>

            <ul class="galeria-imagenes">
                <?php 
                    //contador para indicar que la imagen 4 y 6 serán de otro tamaño
                    $i = 1; 

                    //recorrer el arreglo para obtener el id de cada imagen
                    foreach($galeria_imagenes_ID as $id):
                        //si es imagen 4 o 6 el tamaño será portrait sino square
                        //los tamaños portrair y square los definimos en functions.php
                        $size = ($i == 4 || $i ==6) ? 'portrait' : 'square';
                        $imagenThumb = wp_get_attachment_image_src($id, $size)[0];
                        //asignamos también una variable para la imagen en grande para usar lightbox
                        $imagen = wp_get_attachment_image_src($id, 'full')[0];
                ?>
                        <li>
                            <a href="<?php echo $imagen; ?>" data-lightbox="galeria">
                                <img src="<?php echo $imagenThumb; ?>" alt="imagen">
                            </a>
                        </li>
                <?php
                        $i++;       
                    endforeach;
                ?>
            </ul>

            
            
            
        <?php endwhile; ?>
    </div>

</main>

<?php get_footer(); ?>