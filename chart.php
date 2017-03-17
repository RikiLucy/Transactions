<script>
    var chart = c3.generate({
        bindto: '#chart',
        data: {
            type: 'step',
            columns: [
                ['баланс', <?php foreach ($balance as $res) echo $res . ',' ?>],
                ['операция', <?php foreach ($operations as $operation) echo $operation . ',' ?>]
            ]
        },
        axis: {
            x: {
                label: "операции"
            },
            y: {
                label: {
                    text: 'Баланс',
                    position: 'outer-middle'
                },
                tick: {
                    format: d3.format("$,") // ADD
                }
            },
            y2: {
                show: false,
                tick: {
                    format: d3.format("$,") // ADD
                },
                label: {
                    text: 'Y2 Label',
                    position: 'outer-middle'
                }
            }
        }
    });
</script>