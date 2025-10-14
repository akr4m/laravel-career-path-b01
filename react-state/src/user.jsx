import { useContext } from "react";
import { AuthContext } from "./auth-context";

export function User() {
  const { authenticated } = useContext(AuthContext);

  return (
    <div>
      {authenticated ? (
        <p>User is authenticated</p>
      ) : (
        <p>User is not authenticated</p>
      )}
    </div>
  );
}

export function LoginButton() {
  const { setAuthenticated } = useContext(AuthContext);

  return <button onClick={() => setAuthenticated(true)}>Login</button>;
}
