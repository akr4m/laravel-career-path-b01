import { useState } from "react";

export function Parent() {
  const [count, setCount] = useState(0);

  return (
    <>
      <Child count={count} />
      <button onClick={() => setCount(count + 1)}>Increment</button>
    </>
  );
}

export function Child(props) {
  return (
    <div>
      <p>Child shows Count: {props.count}</p>
    </div>
  );
}
