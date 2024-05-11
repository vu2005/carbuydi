const options = {
    make: ["Toyota", "Honda"],
    model: ["Corolla", "Civic"],
    address: ["123 Street, City"],
    minPrice: 0,
    maxPrice: 0,
    minYear: 0,
    maxYear: 0,
    minMileage: 0,
    maxMileage: 0,
    name: ["Gasoline"],
    transmission: ["Automatic"],
    color: ["Red"],
    seats: ["5"],
    name: ["John Doe"],
};
function handleFilter(options) {
    const filtered = cars.filter((car) => {
        (!options.make.length || options.make.includes(car.make)) &&
        (!options.model.length || options.model.includes(car.model)) &&
        (!options.address.length || options.address.includes(car.address)) &&

        (!options.minPrice.length || options.minPrice <= car.minPrice) &&
        (!options.maxPrice.length || options.maxPrice >= car.maxPrice) &&

        (!options.minYear.length || options.minYear <= car.minYear) &&
        (!options.maxYear.length || options.maxYear >= car.maxYear) &&

        (!options.minMileage.length || options.minMileage <= car.minMileage) &&
        (!options.maxMileage.length || options.maxMileage >= car.maxMileage) &&

        (!options.fuel_type.length || options.fuel_type.includes(car.fuel_type)) &&
        (!options.transmission.length || options.transmission.includes(car.transmission)) &&
        (!options.color.length || options.color.includes(car.color)) &&
        (!options.seats.length || options.seats.includes(car.seats)) &&
        (!options.name.length || options.name.includes(car.name));
    });
}