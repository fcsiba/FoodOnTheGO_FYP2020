const books = [
{
    data:  [
{
    id: "1",
    title: "Fries",
    description: "Large",
    cost: 200
},
{
    id: "2",
    title: "Hot Shots",
    description: "8 pieces",
    cost: 250
},
{
    id: "3",
    title: "BBQ Wings",
    description: "8 pieces",
    cost: 350
}
    ],
    name: "Starters"
},
{
    data: [
{
    id: "4",
    title: "Zinger Burger",
    description: "Served with Fries and Soft Drink",
    cost: 600
},
{
    id: "5",
    title: "Zinger Stacker",
    description: "Served with Fries and Soft Drink",
    cost: 750
},
{
    id: "6",
    title: "Mighty Zinger",
    description: "Served with Fries and Soft Drink",
    cost: 700
},
{
    id: "7",
    title: "Twister",
    description: "Served with Fries and Soft Drink",
    cost: 450
},
{
    id: "8",
    title: "Chicken & Chips",
    description: "2 pieces",
    cost: 550
}
    ],
    name: "Mains"
},
];
export const getProducts = () => {
    return books;
    
}