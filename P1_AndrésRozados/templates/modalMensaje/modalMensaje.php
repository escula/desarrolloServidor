       

<?php
    class GeneradorModal{
        public static function modalError($mensjeInterno){
            echo '
            <script defer>
        
                function cerrarDialog(){
                    
                    let dialogo=document.querySelector("dialog");
                    console.log(dialogo)
                    console.log(dialogo.style.display="none")
                }
                
            </script>
            <dialog open id="dialogoError">
                <div>
                    <header>
                        <img src="../../assets/circle-xmark.svg" alt="cerrar modal" onclick="cerrarDialog()">
                    </header>
                    <section>
                        <p>'.$mensjeInterno.'</p>
                    </section>
                </div>
            </dialog>';
        }
    }
    
?>
        
