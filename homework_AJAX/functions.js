'use strict';

function deleteProduct(id) {
    fetch('/products/delete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({id: id}),
    })
    .then(response => response.json())
    .then(body => {
        if(body.status == 204) {
            fetch('/products/table')
            .then(response => response.text())
            .then(html => {
                const container = document.getElementById('table_container');
                if(container) {
                    container.removeChild(container.firstChild);
                    container.innerHTML = html;
                    toastr.info('Successfully deleted item with id ' + id + '.');
                }
                else {
                    toastr.error('An error occurred...');
                }
            });
        }
        else if(body.status == 404) {
            toastr.error('Item with id ' + id + ' is not found.');
        }
        else {
            toastr.error('An error occurred...');
        }
    });
}