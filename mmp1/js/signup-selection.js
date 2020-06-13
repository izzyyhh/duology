window.addEventListener("DOMContentLoaded", () =>{

    new SlimSelect({
    select: '#multiple-roles',
    limit: 2,
    hideSelectedOption: true,
    searchingText: "searching role",
    searchText: "no role found",
    searchPlaceholder: "search you role",
    placeholder: "select roles",
    deselectLabel: "<span>XXX</span>",
    });

    
    new SlimSelect({
        select: '#multiple-champions',
        limit: 3,
        hideSelectedOption: true,
        searchingText: "searching champion",
        searchText: "no champion found",
        searchPlaceholder: "search your champions",
        placeholder: "select champions",
        deselectLabel: "<span>XXX</span>",
    });
});
