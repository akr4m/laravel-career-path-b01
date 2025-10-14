import "./App.css";
import { AuthProvider } from "./auth-context";
import {
  CounterProvider,
  DisplayCount,
  DisplayCountTwo,
  IncrementButton,
} from "./context-example";
import { LoginButton, User } from "./user";

function App() {
  return (
    <AuthProvider>
      <CounterProvider>
        <h1>Interactive Cares</h1>
        <div className="card">
          <DisplayCount />
          <DisplayCountTwo />
          <IncrementButton />
          <User />
          <LoginButton />
        </div>
      </CounterProvider>
    </AuthProvider>
  );
}

export default App;
