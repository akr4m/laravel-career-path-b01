export default function Hello(props) {
    console.log(props);

    return (
        <div className="mx-12 my-6 items-center justify-center ">
            <h1>Hello, {props.name}!</h1>
            <div>{props.frameworks.length} Frameworks</div>
            <ul>
                {props.frameworks.map((framework) => (
                    <li key={framework}>{framework}</li>
                ))}
            </ul>
        </div>
    );
}
