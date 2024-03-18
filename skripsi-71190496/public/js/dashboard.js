/* globals Chart:false, feather:false */

(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  const ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
  const advancedColumns = [
    {
      width: 250,
      label: 'Company',
      field: 'company',
    },
    {
      width: 250,
      sort: false,
      defaultValue: 'Warsaw',
      options: ['London', 'Warsaw', 'New York'],
      inputType: 'select',
      label: 'Office',
      field: 'office',
    },
    {
      width: 250,
      inputType: 'number',
      defaultValue: 1,
      label: 'Employees',
      field: 'employees',
    },
    {
      width: 100,
      defaultValue: false,
      inputType: 'checkbox',
      label: 'International',
      field: 'international',
    },
  ];

  const advancedRows = [
    {
      company: 'Smith &amp; Johnson',
      office: 'London',
      employees: 30,
      international: true,
    },
    {
      company: 'P.J. Company',
      office: 'London',
      employees: 80,
      international: false,
    },
    {
      company: 'Food &amp; Wine',
      office: 'London',
      employees: 12,
      international: false,
    },
    {
      company: 'IT Service',
      office: 'London',
      employees: 17,
      international: false,
    },
    {
      company: 'A. Jonson Gallery',
      office: 'London',
      employees: 4,
      international: false,
    },
    {
      company: 'F.A. Architects',
      office: 'London',
      employees: 4,
      international: false,
    },
  ];
  $('.dropdown-toggle').dropdown()
  const tableModal = new TableEditor(
  document.getElementById('table_modal'),
  {
    columns: advancedColumns,
    rows: advancedRows,
  },
  { mode: 'modal', entries: 5, entriesOptions: [5, 10, 15] }
  
);
})()
