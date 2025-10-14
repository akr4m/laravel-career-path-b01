import { createContext, useContext, useState } from "react";
import { AuthContext } from "./auth-context";

// 1. একটি Context তৈরি করুন
const CounterContext = createContext(); // initial value না দিলেও চলবে

// 2. Provider কম্পোনেন্ট তৈরি - যেটা children কে context value প্রদান করবে
export function CounterProvider({ children }) {
  const [count, setCount] = useState(0);
  // Provider এর value props এ যে ডাটা দেবো সেটাই context এ শেয়ার হবে

  return (
    <CounterContext.Provider value={{ count, setCount }}>
      {/* এখানে children কম্পোনেন্ট থাকবে যারা context value ব্যবহার করবে */}
      {children}
    </CounterContext.Provider>
  );
}

// 3. Consumer কম্পোনেন্ট তৈরি - যেটা context value গ্রহণ করবে
// student 1:
export function DisplayCount() {
  const { authenticated } = useContext(AuthContext);
  const { count } = useContext(CounterContext);
  return (
    <>
      {authenticated ? (
        <p>authenticated checking from counter</p>
      ) : (
        <p> unauthenticated checking from counter</p>
      )}
      <p>Count for Student One: {count}</p>
    </>
  );
}
// student 2:
export function DisplayCountTwo() {
  const { count } = useContext(CounterContext);
  return <p>Count for Student Two: {count}</p>;
}

export function IncrementButton() {
  const { setCount } = useContext(CounterContext);

  return (
    <button onClick={() => setCount((prev) => prev + 1)}>Increment</button>
  );
}
