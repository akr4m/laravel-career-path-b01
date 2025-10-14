import { useState } from "react";

function Counter(props) {
  // একটি state ভেরিয়েবল তৈরি করুন যার নাম count এবং একটি সেটার ফাংশন setCount
  const [count, setCount] = useState(props.count);

  return (
    <div style={{ border: "1px solid black" }}>
      <p>Count: {count}</p>
      <p>From Parent's Count: {props.count}</p>
      <button onClick={() => setCount(count + 1)}>Increment</button>
    </div>
  );
}

export default Counter;
