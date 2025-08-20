import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from "@angular/forms";

import { AppComponent } from './app.component';
import { SuccessComponent } from "./success-alert/success-alert.component";
import { ErrorAlertComponent } from './error-alert/error-alert.component';
import { ServerComponent } from "./server/server.component";
import { ServersComponent } from "./servers/servers.component";
import { UsernameInputComponent } from './username-input/username-input.component';
import { DisplayDetailsComponent } from './display-details/display-details.component';

@NgModule({
  declarations: [
    AppComponent,
    SuccessComponent,
    ErrorAlertComponent,
    ServerComponent,
    ServersComponent,
    UsernameInputComponent,
    DisplayDetailsComponent
  ],
  imports: [
    BrowserModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
