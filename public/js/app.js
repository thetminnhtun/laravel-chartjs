var context = document.getElementById("user-chart").getContext("2d");

var myChart,
    labels,
    data,
    type = "bar",
    days = 7;

function fetchData() {
    axios
        .get("/api/users", {
            params: {
                days: days,
            },
        })
        .then((response) => {
            labels = response.data.labels;
            data = response.data.data;

            render();
        });
}

function render() {
    myChart = new Chart(context, {
        type: type,
        data: {
            labels: labels,
            datasets: [
                {
                    label: "users",
                    data: data,
                    backgroundColor: ["rgba(255, 99, 132, 0.2)"],
                    borderColor: ["rgba(255, 99, 132, 1)"],
                    borderWidth: 1,
                },
            ],
        },
    });
}

function updateDays(selectedDays) {
    days = selectedDays;
    myChart.destroy();
    fetchData();
}

function updateType(selectedType) {
    type = selectedType;
    myChart.destroy();
    fetchData();
}

fetchData();
