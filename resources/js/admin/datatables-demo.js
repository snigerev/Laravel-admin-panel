/*
 * Copyright (c) 1.11.2019.
 * File - datatables-demo.js
 * Author - tor
 */

// Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable({
        "language": {
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "infoPostFix": "",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
            },
            "select": {
                "rows": {
                    "_": "Выбрано записей: %d",
                    "0": "Кликните по записи для выбора",
                    "1": "Выбрана одна запись"
                }
            }
        }
    });
});
