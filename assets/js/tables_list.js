document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('tabla-container');

    // Verifica si 'datos' es un array válido y contiene al menos un registro
    if (!Array.isArray(datos) || datos.length === 0) {
        container.innerHTML = '<p>No hay datos en la tabla.</p>';
        return;
    }

    // 👉 Crear enlace para insertar nuevo registro (comentado si no se desea mostrar)
    /*
    const insertarLink = document.createElement('a');
    insertarLink.href = `../../controllers/table/tabla_insertar.php?nombreTabla=${nombreTabla}`;
    insertarLink.textContent = 'Insertar nuevo registro';
    insertarLink.style.display = 'inline-block';
    insertarLink.style.margin = '10px 0';
    insertarLink.style.fontWeight = 'bold';
    container.appendChild(insertarLink);
    */

    // 👉 Crear tabla para mostrar los datos
    const table = document.createElement('table');
    table.border = 1;

    // 👉 Crear fila de encabezados con nombres de columnas
    const header = document.createElement('tr');
    const columnas = Object.keys(datos[0]); // Obtiene las claves (columnas) de los datos

    columnas.forEach(col => {
        const th = document.createElement('th');
        th.textContent = col;
        header.appendChild(th);
    });

    // 👉 Agrega columnas adicionales para acciones (Actualizar / Eliminar)
    // Puedes comentar las siguientes líneas si no deseas mostrar estas opciones:
    /*
    header.innerHTML += '<th>Actualizar</th><th>Eliminar</th>';
    */
    table.appendChild(header);

    // 👉 Agrega cada fila de datos a la tabla
    datos.forEach(row => {
        const tr = document.createElement('tr');
        
        // Agrega cada celda de la fila
        columnas.forEach(col => {
            const td = document.createElement('td');
            td.textContent = row[col];
            tr.appendChild(td);
        });

        // 👉 Agrega celda para acción de actualizar (comentar si no se quiere mostrar)
        /*
        const tdUpdate = document.createElement('td');
        tdUpdate.innerHTML = `<a href="../../controllers/table/tabla_update.php?nombreTabla=${nombreTabla}&id=${row[pk]}">Editar</a>`;
        tr.appendChild(tdUpdate);
        */

        // 👉 Agrega celda para acción de eliminar (comentar si no se quiere mostrar)
        /*
        const tdDelete = document.createElement('td');
        tdDelete.innerHTML = `<a href="../../controllers/table/tabla_delete.php?nombreTabla=${nombreTabla}&id=${row[pk]}">Eliminar</a>`;
        tr.appendChild(tdDelete);
        */

        table.appendChild(tr);
    });

    // 👉 Agrega la tabla completa al contenedor
    container.appendChild(table);
});
