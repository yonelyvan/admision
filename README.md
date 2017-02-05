# proyecto admision
cambiar contraseña DB si es nesesario, por defecto esta vacio('') usando xampp
**clonar repositorio (unica vez)**<br>
```sh
git clone 'url'
```
**configuacion (solo por primera vez de uso)**<br>
```sh
git config --global user.email "correo@gmail.com"
git config --global user.name "username"
```
#============resumen=============
- subir cambios a github:
```sh
git add . 
git commit -m "Commit message"
git pull
git push origin master
```
- actualizar mi repositorio local para modificar aumentar o eliminar codigo
```sh
git pull
```
- ver estado de git, se puede ejecutar en cualquier momento
```sh
git status
```
#=================================

#uso frecuente explicacion del resumen  
**git add .**<br> 
agregar todos los archivos modificados o creados a nuestro repositorio local el '.' indica todos lo archivos.

**git commit -m "Commit message"**<br> 
todos los archivos en nuevos o modificados, agregados anteriormente al proyecto se indexan en el repositorio local.

**git pull**<br>
actualizamos el repositorio local con los cambio que talvez ayan en github(nube) generalmente si otro contribuyente a subido cambios.<br>
se usa despues de un 'commit' antes de hacer 'git push' (esto es para asegurarse que no se pierdan cambios q otro usuarios hacen en nube)<br>
tambien se usa despues de hace un 'git push' antes de hacer nuevas modificaciones. 

**git push origin master** <br>
nuestro repositorio local indexado, con nuestros cambios y actualizado son guardados en github(nube) 

