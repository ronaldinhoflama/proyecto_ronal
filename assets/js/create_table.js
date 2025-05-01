// Esta función agrega un nuevo bloque de campos para crear una columna adicional en la tabla
function agregarCampo() {
    const container = document.getElementById('camposContainer');
    const index = container.children.length;

    // HTML dinámico para cada nuevo campo adicional, con sus respectivos inputs y opciones
    const campoHTML = `
        <div id="campo-${index}">
            <div>
                <label>Nombre:</label>
                <input type="text" name="campos[${index}][nombre]" required>
            </div>
            <div>
                <label>Tipo:</label>
                <select name="campos[${index}][tipo]">
                    <option value="INT">INT</option>
                    <option value="VARCHAR(50)">VARCHAR(50)</option>
                    <option value="FLOAT">FLOAT</option>
                    <option value="DATE">DATE</option>
                </select>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="campos[${index}][es_fk]" value="true" onclick="toggleFKFields(${index})">
                    ¿Es FK?
                </label>
            </div>
            <div id="tabla_fk-${index}" style="display:none;">
                <label>Tabla FK:</label>
                <input type="text" name="campos[${index}][tabla_fk]">
            </div>
            <div id="columna_fk-${index}" style="display:none;">
                <label>Columna FK:</label>
                <input type="text" name="campos[${index}][columna_fk]">
            </div>
            <hr>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', campoHTML);
}

// Esta función muestra u oculta los campos adicionales para definir claves foráneas
function toggleFKFields(index) {
    const isChecked = document.querySelector(`input[name="campos[${index}][es_fk]"]`).checked;
    const tablaFK = document.getElementById(`tabla_fk-${index}`);
    const columnaFK = document.getElementById(`columna_fk-${index}`);

    if (isChecked) {
        // Mostrar los inputs de tabla y columna si es clave foránea
        tablaFK.style.display = 'block';
        columnaFK.style.display = 'block';
    } else {
        // Ocultar si no está marcado
        tablaFK.style.display = 'none';
        columnaFK.style.display = 'none';
    }
}
