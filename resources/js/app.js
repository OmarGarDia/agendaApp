import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const calendarDays = document.getElementById("calendarDays");
    const monthYear = document.getElementById("monthYear");
    const eventModal = document.getElementById("eventModal");
    const closeModal = document.getElementById("closeModal");
    const eventForm = document.getElementById("eventForm");
    const eventDate = document.getElementById("eventDate");
    const existingEvents = document.getElementById("existingEvents");
    const prevMonth = document.getElementById("prevMonth");
    const nextMonth = document.getElementById("nextMonth");

    let currentDate = new Date();
    let events = [];

    async function fetchEvents() {
        try {
            const response = await fetch("/events");
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            events = await response.json();
            return events;
        } catch (error) {
            console.error("Error fetching events:", error);
            return [];
        }
    }

    function renderCalendar() {
        calendarDays.innerHTML = "";
        const firstDay = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth(),
            1
        );
        const lastDay = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() + 1,
            0
        );
        const daysInMonth = lastDay.getDate();
        const startDay = firstDay.getDay();

        monthYear.textContent = currentDate.toLocaleString("default", {
            month: "long",
            year: "numeric",
        });

        for (let i = 0; i < startDay; i++) {
            calendarDays.innerHTML += '<div class="text-gray-400"></div>';
        }

        for (let i = 1; i <= daysInMonth; i++) {
            const dayDiv = document.createElement("div");
            dayDiv.className =
                "p-2 cursor-pointer hover:bg-blue-100 dark:hover:bg-blue-700 relative day-cell";
            dayDiv.textContent = i;

            const date = `${currentDate.getFullYear()}-${String(
                currentDate.getMonth() + 1
            ).padStart(2, "0")}-${String(i).padStart(2, "0")}`;
            const dayEvents = events.filter((event) =>
                event.date.startsWith(date)
            );

            if (dayEvents.length > 0) {
                dayDiv.classList.add("has-event");

                const eventIndicator = document.createElement("span");
                eventIndicator.className =
                    "absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-3 h-3 flex items-center justify-center";
                eventIndicator.textContent = dayEvents.length;
                dayDiv.appendChild(eventIndicator);

                const eventTooltip = document.createElement("div");
                eventTooltip.className = "tooltip";
                eventTooltip.innerHTML = dayEvents
                    .map(
                        (event) =>
                            `<strong>${event.title}</strong>: ${event.description}`
                    )
                    .join("<br>");

                dayDiv.appendChild(eventTooltip);

                dayDiv.addEventListener("mouseover", function () {
                    eventTooltip.style.display = "block";
                });

                dayDiv.addEventListener("mouseout", function () {
                    eventTooltip.style.display = "none";
                });
            }

            dayDiv.addEventListener("click", function () {
                eventDate.value = date;
                showEventDetails(dayEvents);
                showModal();
            });

            calendarDays.appendChild(dayDiv);
        }
    }

    function showEventDetails(dayEvents) {
        existingEvents.innerHTML = "";

        if (dayEvents.length > 0) {
            const eventList = document.createElement("ul");
            eventList.className = "list-disc pl-4 space-y-2";

            dayEvents.forEach((event) => {
                const eventItem = document.createElement("li");
                eventItem.className = "text-gray-700 dark:text-gray-700";
                eventItem.innerHTML = `<strong>${event.title}</strong>: ${event.description}`;
                eventList.appendChild(eventItem);
            });

            existingEvents.appendChild(eventList);
        } else {
            existingEvents.innerHTML =
                "<p class='text-gray-500 dark:text-gray-400'>No events for this day.</p>";
        }
    }

    function showModal() {
        eventModal.classList.remove("hidden");
        setTimeout(() => {
            eventModal
                .querySelector("div")
                .classList.remove("scale-95", "opacity-0");
        }, 10);
    }

    function hideModal() {
        eventModal.querySelector("div").classList.add("scale-95", "opacity-0");
        setTimeout(() => {
            eventModal.classList.add("hidden");
        }, 300);
    }

    prevMonth.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        fetchEvents().then(renderCalendar);
    });

    nextMonth.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        fetchEvents().then(renderCalendar);
    });

    closeModal.addEventListener("click", hideModal);

    eventForm.addEventListener("submit", function (e) {
        e.preventDefault();

        fetch("/events", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                title: document.getElementById("title").value,
                description: document.getElementById("description").value,
                event_date: eventDate.value,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                alert(data.message);
                hideModal();
                fetchEvents().then(renderCalendar);
            });
    });

    fetchEvents().then(renderCalendar);
});
